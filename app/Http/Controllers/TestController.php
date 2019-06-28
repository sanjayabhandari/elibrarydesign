<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category\Category;

class TestController extends Controller
{

    public function index()
    {
     $cat= Category::all();

        return view('category.category',compact('cat'));
    }
    //
}
