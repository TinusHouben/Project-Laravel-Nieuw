<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class IndexController extends Controller
{
    public function showNews()
    {
        $newsitems = News::orderBy('published_at', 'desc')->paginate(5);
        return view('index', compact('newsitems'));
    }
}
