<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Level;
use App\Services\CountLevelService;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $level = Level::Active()->SelectName()->get()->toArray();
        $levelbar = Level::Active()->SelectName()->get()->toArray();
        $count = CountLevelService::countLevel($levelbar,0);
        $status = CountLevelService::countLevel($levelbar,2);
        return view('dashboard.index',[
            'level' => $level,
            'levelbar' => $levelbar,
            'countbar' => $count,
            'status' => $status]);
    }
}
