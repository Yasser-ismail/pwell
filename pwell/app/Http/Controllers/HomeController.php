<?php

namespace App\Http\Controllers;

use App\Http\Requests\FrontEnd\Messages\Store;
use App\Models\Category;
use App\Models\Message;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {

        $places = Place::all();
        $users = User::all();
        $categories = Category::all();
        return view('welcome', compact('places', 'users', 'categories'));
    }

    public function storeMessage(Store $request)
    {
        $message = Message::create($request->all());
        if ($message){
            Session::flash('message_sent', 'Your Message has been sent.');
        }else{
            Session::flash('message_failure', 'There is an error, try again later!');
        }
        return redirect()->route('welcome');

    }
}
