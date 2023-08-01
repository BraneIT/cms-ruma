<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function home(){
        return view('frontend_views.index');
    }
    function history(){
        return view('frontend_views.istorijat');
    }
    function archaeology(){
        return view('frontend_views.arheologija');
    }
}
