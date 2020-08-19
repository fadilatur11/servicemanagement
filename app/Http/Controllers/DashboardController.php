<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Level;
use App\Services\CountLevelService;
use App\Project;
use App\StatusProject;

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
     * $carcount with status 0 = get data ticket masing2 level dengan status sama dgn 0
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $level = Level::Active()->SelectName()->get()->toArray();
        $cardcount = CountLevelService::countLevel($level,0);
        $finished = CountLevelService::countLevel($level,2);
        $progress = CountLevelService::countLevel($level,1);
        $closed = CountLevelService::countLevel($level,3);
        $statusProject = StatusProject::SelectField()->get()->toArray();
        $projectProgress = Project::GetStatus(1)->count();
        $projectHold = Project::GetStatus(2)->count();
        $projectRejected = Project::GetStatus(3)->count();
        $projectClosed = Project::GetStatus(1)->count();
        return view('dashboard.index',[
            'level' => $level,
            'cardcount' => $cardcount,
            'finished' => $finished,
            'progress' => $progress,
            'closed' => $closed,
            'statusProject' => $statusProject,
            'projectProgress' => $projectProgress,
            'projectHold' => $projectHold,
            'projectRejected' => $projectRejected,
            'projectClosed' => $projectClosed]);
    }
}
