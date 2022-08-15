<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticlesIndex extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }
}
