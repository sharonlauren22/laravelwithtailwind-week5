<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class ArticleController2 extends Controller
{

    public function index(): View {
        return view("article/article");
    }

    public function create(): View {
        return view();
    }
}
