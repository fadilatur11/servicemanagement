<x-header/>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>
                        List Ticket
                    </div>
                </div>


                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <a href="{{ url('ticket/create') }}"><button class="mb-2 mr-2 btn btn-primary">Create Ticket</button></a>
                    </div>
                </div>
                
            </div>
        </div>

        @if (session('messages'))
        <div class="alert alert-success">
            {{ session('messages') }}
        </div>
        @endif

        <div class="row">

            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="col-sm-12">
                        <span class="titlefont">Filter :</span>
                        <form class="filterkolom form-inline" action=" {{url('/ticket') }}" method="GET">
                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                <input name="ticket" placeholder="Ticket No" type="text" class="form-control">
                            </div>
                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                <select class="form-control" name="filter" id="selectlevel">
                                    <option value="">Level</option>
                                    <option value="">All</option>
                                    @foreach ($level as $getlevel)
                                        <option value="{{ $getlevel['id'] }}">{{ $getlevel['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2 mr-sm-2 mb-sm-0 position-relative form-group">
                                <input class="form-control" name="date" type="date" value="" placeholder="Date">
                            </div>
                                <button class="btn btn-primary" type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="card-body" style="overflow-x:auto;">
                        
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>Ticket No</th>
                                    <th>Subject</th>
                                    <th>Project</th>
                                    <th>Category</th>
                                    <th>Request</th>
                                    <th>Date</th>
                                    <th>From Department</th>
                                    <th>Level</th>
                                    <th>Pick-up By</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($ticket as $dataTicket)
                                <tr>
                                    <th scope="row">{{ $dataTicket->ticket_no}}</th>
                                    <td>{{ $dataTicket->subject }}</td>
                                    <td>{{ $dataTicket->project }}</td>
                                    <td>{{ $dataTicket->category->category }}</td>
                                    <td>{{ $dataTicket->user->name }}</td>
                                    <td>{{ date('Y-m-d', strtotime($dataTicket->created_at)) }}</td>
                                    <td>{{ $dataTicket->toDepartment->department }}</td>
                                    <td>
                                        <button type="button" class="mb-2 mr-2 btn
                                            @if ($dataTicket->level == 1) btn-danger @elseif ($dataTicket->level == 2) btn-warning
                                            @elseif ($dataTicket->level == 3) btn-info @elseif ($dataTicket->level == 4) btn-light @endif widthbtn">{{ $dataTicket->relationLevel->name }}
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="mb-2 mr-2 btn {{ $dataTicket->pickupBy ? 'btn-secondary' : 'btn-alternate' }} widthbtn">
                                            {{ $dataTicket->pickupBy ? $dataTicket->pickupBy->name : 'Pick-up' }}
                                        </button>
                                    </td>
                                    <td>
                                    <a href="{{ url('ticket/detail/'.$dataTicket->ticket_no) }}" target="_blank">
                                            <button type="button" class="mb-2 mr-2 btn btn-primary">Detail</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $ticket->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer/>
   <script>
        $(function() {
            $("#selectlevel").change(function(){
                let select = $(this).val();
                if (select == '') {
                    window.location = '{{ url('/ticket') }}'
                }
            })
        })
    </script>