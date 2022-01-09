<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Domains;

class HomeController extends Controller
{
    public function ShowAllNews() {
        $data = \DB::table('news')
            ->join('domains', 'news.id_domain', '=', 'domains.id')
            ->select('news.*', 'domains.source', 'domains.favicon')
            ->get()
            ->take(-15);

        return view('home', ['data' => $data]);
    }

    public function ShowItemNews($alias) {
        $data = \DB::table('news')
            ->join('domains', 'news.id_domain', '=', 'domains.id')
            ->select('news.*', 'domains.source', 'domains.favicon')
            ->where('alias', $alias)
            ->first();

        return view('news-item', ['data'=> $data]);
    }
}
