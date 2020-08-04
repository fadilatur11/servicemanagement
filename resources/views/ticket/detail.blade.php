@include('layouts.header')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph text-success">
                                        </i>
                    </div>
                    <div>Detail Ticket
                        <div class="page-title-subheading">{{ $ticket->ticket_no }}</div>
                    </div>
                </div>
                <div class="page-title-actions">
                                        
                </div>
            </div>
        </div>
        
        <div class="tab-content">
            
            <div class="tab-pane tabs-animation fade show active" id="tab-content-1" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form>
                        <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label">Project Name <span class="requiredfont">*<span></label>
                                <div class="col-sm-10">
                                <input name="project" placeholder="Enter your Project Name" type="text" value="{{ $ticket->project }}" class="form-control" disabled autocomplete="off">
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label">Subject <span class="requiredfont">*<span></label>
                                <div class="col-sm-10">
                                <input name="subject" placeholder="Enter your Subject" type="text" value="{{ $ticket->subject }}" class="form-control" autocomplete="off" disabled>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="examplePassword" class="col-sm-2 col-form-label">Category <span class="requiredfont">*<span></label>
                                <div class="col-sm-4">
                                    <select name="category_id" class="form-control" disabled>
                                    <option value="">{{$ticket->category->category}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleSelectMulti" class="col-sm-2 col-form-label">Send To <span class="requiredfont">*<span></label>
                                <div class="col-sm-4">
                                    <select name="send_to" class="form-control" disabled>
                                    <option value="">{{ $ticket->toDepartment->department }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="exampleSelectMulti" class="col-sm-2 col-form-label">Pick-up By <span class="requiredfont">*<span></label>
                                <div class="col-sm-4">
                                    <select name="pickup" class="form-control" disabled>
                                    <option value="">{{ $ticket->pickupBy ? $ticket->pickupBy->name : 'none' }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="exampleText" class="col-sm-2 col-form-label">Level <span class="requiredfont">*<span></label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="level" disabled>
                                    <option value="">{{ $ticket->relationLevel->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleText" class="col-sm-2 col-form-label">URL <span class="requiredfont">*<span></label>
                                <div class="col-sm-10">
                                <input name="url" type="text" class="form-control" value="{{ $ticket->url }}" disabled placeholder="Enter your URL">
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleText" class="col-sm-2 col-form-label">Description <span class="requiredfont">*<span></label>
                                <div class="col-sm-10">
                                    <textarea id="w3review" name="w3review" rows="7" class="form-control" disabled>
                                       {!! strip_tags($ticket->description) !!}
                                        </textarea>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleFile" class="col-sm-2 col-form-label">File <span class="requiredfont">*<span></label>
                                <div class="col-sm-3">
                                <a href="{{ asset('storage/'.substr($ticket->file,0,4)).'/'.$ticket->file }}" target="_blank"><b>{{ $ticket->file }}</b></a>
                                </div>
                            </div>
                            
                            <div class="position-relative row">
                                <div class="col-sm-2 col-form-label"><button class="mb-2 mr-2 btn btn-primary" type="submit">Submit</button></div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
<script>
$('document').ready(function(){
    $('textarea').each(function(){
        $(this).val($(this).val().trim());
        }
    );
});
</script>