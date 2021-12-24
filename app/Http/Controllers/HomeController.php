<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Cart;
use App\Models\Art;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\CartItem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $arts = Art::with('images')->get();
        $events = Event::with('images')->get();

        /* foreach ($arts[0]->images as $image) {
            dd($image);
        } */
        /*// dd($arts[0]->images());
        $user = Auth::user();

        $user->givePermissionTo('art_create');

//        dd($user->with('roles'));
        dd(User::role('admin')->get());*/

        return view('index', compact('arts', 'events'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

}
