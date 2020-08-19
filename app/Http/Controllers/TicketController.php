<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketPostRequest;
use App\Services\CreateTicketService;
use App\Repositories\TicketRepositoryInterface;
use App\User;
use App\Level;
use App\Categories;
use App\Department;
use Auth;
use App\Ticket;

class TicketController extends Controller
{
    private $ticketRepository;
    
    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }
    /**
     * index display data with role user
     * if role admin, display all data, else get data by role
     */
    public function index(Request $request)
    {
        $ticket = Ticket::Sorting()->FilterLevel($request->input('filter'))
                ->FilterTicket($request->input('ticket'))
                ->FilterDate($request->input('date'))
                ->FilterPickup($request->input('pickupby'))
                ->paginate(10);

        $level = Level::Active()->SelectName()->get()->toArray();
        $pickupBy = User::SelectField()->Active()->Responsibility(1)->get()->toArray();
        return view('ticket.index',[
            'ticket' => $ticket,
            'level' => $level,
            'pickupby' => $pickupBy
            ]);
    }

    public function pickupByMe(Request $request)
    {
        $ticket = Ticket::Sorting()->FilterLevel($request->input('filter'))
        ->FilterTicket($request->input('ticket'))
        ->FilterDate($request->input('date'))
        ->FilterPickup(Auth::user()->id)
        ->paginate(10);
        
        $level = Level::Active()->SelectName()->get()->toArray();
        $pickupBy = User::SelectField()->Active()->Responsibility(1)->get()->toArray();
        return view('ticket.pickupbyme',[
            'ticket' => $ticket,
            'level' => $level,
            'pickupby' => $pickupBy
            ]);
    }

    public function create()
    {
        $category = Categories::Active()->SelectName()->get()->toArray();
        $department = Department::Active()->SelectName()->get()->toArray();
        $level = Level::Active()->SelectName()->get()->toArray();
        return view('ticket.create', [
            'category'=> $category,
            'department'=> $department,
            'level' => $level]);
    }

    public function actioncreate(TicketPostRequest $request,CreateTicketService $ticketService)
    {
        $post = $ticketService->create($request->only(['project','department_id','user_id','subject','category_id','send_to','level','url','description']));
        $name_file = date('YmdHis').'_'.$request->file('file')->getClientOriginalName();
        $image = ['file' => $name_file];
        $path = $request->file('file')->storeAs(date('Y'),$name_file);
        $data = array_merge($post,$image);
        $this->ticketRepository->create($data);
        return redirect()->route('listicket')->with('messages','Your data has been submitted !');

    }

    public function detail($ticket_no)
    {
        $ticket = Ticket::FilterTicket($ticket_no)->first();
        return view('ticket.detail',['ticket' => $ticket]);
    }

    public function pickup(Request $req)
    {
        Ticket::FilterTicket($req->input('ticket_no'))->update(['pickup_by' => Auth::user()->id]);
        return redirect()->back()->with('messages', 'Ticket has been taken !');
    }
}
