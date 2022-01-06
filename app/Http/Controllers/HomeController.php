<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{
    public function ShowAllNews() {
        return view('home', ['data'=>News::all()->take(-15)]);
    }

    public function ShowItemNews($alias) {
        $news = new News();
        return view('news-item', ['data'=> $news->where('alias', $alias)->first()]);
    }
}
