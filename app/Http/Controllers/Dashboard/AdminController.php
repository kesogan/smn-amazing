<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Models\Art;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Rendering the homepage of the dashboard
     */
    public function dashboard()
    {
        $artPresent = Art::where('type', 'art')->count();
        $tattooPresent = Art::where('type', 'tattoo')->count();
        $eventPresent = Event::count();
        $userRegistred = User::count();

        return view('dashboard.index', compact('artPresent', 'eventPresent', 'userRegistred', 'tattooPresent'));
    }

}
