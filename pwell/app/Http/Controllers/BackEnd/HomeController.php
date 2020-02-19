<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $places = Place::all();
        $categories = Category::all();
        $users = User::all();

        return view('backend.index', compact('places', 'categories', 'users'));
    }
}
