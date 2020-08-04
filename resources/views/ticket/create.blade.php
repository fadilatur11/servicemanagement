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
                    <div>Create Ticket
                        <div class="page-title-subheading">Please create your ticket</div>
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
                        <form method="POST" action="{{url('/ticket/actioncreate')}}" enctype="multipart/form-data" autocomplete="on">
                        @csrf
                        <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label">Project Name <span class="requiredfont">*<span></label>
                                <div class="col-sm-10">
                                @error('project')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <input name="project" placeholder="Enter your Project Name" type="text" class="@error('project') is-invalid @enderror form-control" autocomplete="off">
                                    <input type="hidden" name="department_id" value="{{ Auth::user()->department }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleEmail" class="col-sm-2 col-form-label">Subject <span class="requiredfont">*<span></label>
                                <div class="col-sm-10">
                                @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <input name="subject" placeholder="Enter your Subject" type="text" class="@error('subject') is-invalid @enderror form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="examplePassword" class="col-sm-2 col-form-label">Category <span class="requiredfont">*<span></label>
                                <div class="col-sm-4">
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <select name="category_id" class="@error('category_id') is-invalid @enderror form-control">
                                        <option value="">Please Select</option>
                                        @foreach ($category as $getcategory)
                                        <option value="{{$getcategory['id']}}">{{$getcategory['category']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleSelectMulti" class="col-sm-2 col-form-label">Send To <span class="requiredfont">*<span></label>
                                <div class="col-sm-4">
                                @error('send_to')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <select name="send_to" class="@error('send_to') is-invalid @enderror form-control">
                                        <option value="">Please Select</option>
                                        @foreach ($department as $getdepartment)
                                        <option value="{{ $getdepartment['id'] }}">{{$getdepartment['department']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleText" class="col-sm-2 col-form-label">Level <span class="requiredfont">*<span></label>
                                <div class="col-sm-4">
                                @error('level')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <select class="@error('level') is-invalid @enderror form-control" name="level">
                                        <option value="">Please Select</option>
                                        @foreach ($level as $getlevel)
                                        <option value="{{$getlevel['id']}}">{{$getlevel['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleText" class="col-sm-2 col-form-label">URL <span class="requiredfont">*<span></label>
                                <div class="col-sm-10">
                                @error('url')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <input name="url" type="text" class="@error('url') is-invalid @enderror form-control" placeholder="Enter your URL">
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleText" class="col-sm-2 col-form-label">Description <span class="requiredfont">*<span></label>
                                <div class="col-sm-10">
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <textarea name="description" placeholder="Enter your Description" class="@error('url') is-invalid @enderror form-control" rows="7"></textarea>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="exampleFile" class="col-sm-2 col-form-label">File <span class="requiredfont">*<span></label>
                                <div class="col-sm-3">
                                @error('file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="file" class="@error('file') is-invalid @enderror form-control" name="file">
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