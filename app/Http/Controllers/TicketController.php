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
    public function index()
    {
        if (Auth::user()->role == 1) {
            $ticket = Ticket::Sorting()->paginate(5);
        }else{
            $ticket = User::find(Auth::user()->id)->tickets()->paginate(5);
        }
        return view('ticket.index',['ticket' => $ticket]);
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
        $path = $request->file('file')->storeAs('savefile',$name_file);
        $data = array_merge($post,$image);
        $this->ticketRepository->create($data);
        return redirect()->route('listicket')->with('messages','Your data has been submitted !');

    }

    public function storage()
    {
        return response(assets('storage/file.txt'));
    }
}
