<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest;
use App\Database\Eloquent\Model\Model;
use Illuminate\Support\Str;
use App\Models\News;

class parserController extends Controller
{

    public function parserNews(SettingsRequest $req) {

        $json = json_decode($this->getHTML($req->input()));

        foreach($json->items as $k => $v) {
            unset($result);
            if($k+1 >  $req->input('count')) break;
            $v->html = mb_convert_encoding($v->html, 'HTML-ENTITIES', 'utf-8');

             $result = $this->searchData($v->html, [
                'address' => $req->input('class-name-href'),
                'title' => $req->input('class-name-title'),
                'date_text' => $req->input('class-name-additionally')
             ]);

             if(!$result) return $this->showCustomError();

            $result = array_merge($result, $this->searchData($this->getHTML($result), [
                'image' => $req->input('attribute-detailed-img'),
                'description' => $req->input('attribute-detailed-description')
             ]));

             if(!$result) return $this->showCustomError();

             $result['source'] = $this->getDomain($result['address']);
             $result['alias'] = md5($result['title']);
             
             $this->saveData($result);
        }

         return redirect()->route('home')->with('seccess', 'Данные собраны и сохранены!');
    }

    private function getHTML($data) {
        if(!isset($data['count'])) $data['count'] = 0;

        $dat_temp = [
            'temp' => ['{timestamp}', '{count}'],
            'val' => [time(), $data['count']]
        ];

        foreach($dat_temp['temp'] as $k => $v ) {
             if(stristr($data['address'], $v) !== false) {
                $data['address'] = str_replace($v, $dat_temp['val'][$k], $data['address']);
             }
        }

        $req = curl_init($data['address']);
        curl_setopt($req, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36');
        curl_setopt($req, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($req);

        return $content;
    }

    private function searchData($html, $arrXpath = array()) {
        $doc = new \DomDocument();
        $internalErrors = libxml_use_internal_errors(true);
        $doc->loadHTML($html);
        libxml_use_internal_errors($internalErrors);
        $xpath = new \DOMXpath($doc);

        foreach($arrXpath as $k => $v) {
            try {
                $result[$k] = $xpath->evaluate($v);
            } catch(\Throwable $ex) {
                return 0;
            }
            
        }

        return $result;
    }

    private function saveData($data) {
        $news = new News();

        if($news->where('title', $data['title'])->get()->count()) return;

        $news->title = $data['title'];
        $news->description = $data['description'];
        $news->address = $data['address'];
        $news->source = $data['source'];
        $news->date_text = $data['date_text'];
        $news->image = $data['image'];
        $news->alias = $data['alias'];

        $news->save();
    }

    private function showCustomError() {
        return redirect()->route('home')->with('custom_errors', 'Введено неверное выражение XPath!');
    }

    private function getDomain($addr) {
        preg_match('/[\w]{2,}\.ru/siU', $addr, $m);
        return $m[0];
    }

}
