@extends('user.layouts.app')
@section('title')
    @lang($page_title)
@endsection
@section('content')
<section class="mt-md-4 mt-5">
    <div class="container">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 mb-3">
                <div class="card card_type_1">
                    <div class="card-header">
                        <ul
                                class="nav nav-pills nav_menu_card"
                                id="pills-tab"
                                role="tablist"
                        >
                            <li class="nav-item" role="presentation">
                                <button
                                        class="nav-link active"
                                        id="pills-ticket-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-ticket"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-ticket"
                                        aria-selected="true"
                                >
                                    <div class="icon">
                                        <iconify-icon icon="dashicons:tickets-alt"></iconify-icon>
                                    </div>
                                    <div class="text">New Ticket</div>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div
                                    class="tab-pane fade show active"
                                    id="pills-ticket"
                                    role="tabpanel"
                                    aria-labelledby="pills-ticket-tab"
                                    tabindex="0"
                            >
                            <form action="{{route('user.ticket.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
    
                                <div class="form-group ">
                                    <label>@lang('Subject')</label>
                                    <input class="form-control" type="text" name="subject" value="{{old('subject')}}" placeholder="@lang('Enter Subject')">
                                    @error('subject')
                                    <div class="error text-danger">@lang($message) </div>
                                    @enderror
                                </div>
    
                                <div class="form-group ">
                                    <label>@lang('Message')</label>
                                    <textarea class="form-control" name="message" rows="5"  placeholder="@lang('Enter Message')">{{old('message')}}</textarea>
                                    @error('message')
                                    <div class="error text-danger">@lang($message) </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex">
                                        <label for="customFile" class="form-label">Upload File</label>
                                    <label class="show-form-label"></label>
                                    </div>
                                    <div class="custom-file-container">
                                      <input type="file" class="custom-file-input" name="attachments[]" id="upload" />
                                      <label for="customFile" class="custom-file-label">Browse</label>
                                    </div>
                                  </div>
                                  
    
    
                                <div class="submit-btn-wrapper mt-md-5 text-center text-md-left">
                                    <button type="submit"
                                            class=" btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">
                                        <span>@lang('Submit')</span></button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mb-3">
                <div class="card card_type_1">
                    <div class="card-header">
                        <ul
                                class="nav nav-pills nav_menu_card"
                                id="pills-tab"
                                role="tablist"
                        >
                            <li class="nav-item" role="presentation">
                                <button
                                        class="nav-link active"
                                        id="pills-history-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-history"
                                        type="button"
                                        role="tab"
                                        aria-controls="pills-history"
                                        aria-selected="true"
                                >
                                    <div class="icon">
                                        <iconify-icon icon="material-symbols:history"></iconify-icon>
                                    </div>
                                    <div class="text">
                                        Ticket History
                                    </div>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div
                                    class="tab-pane fade show active"
                                    id="pills-ticket"
                                    role="tabpanel"
                                    aria-labelledby="pills-ticket-tab"
                                    tabindex="0"
                            >

                             {{--    <form action="/tickets" method="get" id="history-search">
                                    <input
                                            type="text"
                                            placeholder="Search"
                                            value=""
                                            name="search"
                                            class="form-control"
                                    />
                                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </span>
                                </form> --}}


                                <div class="btn-group w-100 gap-2 my-3" role="group" >
                                    <div class="ticket_status_filter">
                                        <a href="{{route('user.ticket.create')}}" class="order_btn_active">All</a>
                                        <a href="{{route('user.ticket.filter', ['status' => 0])}}" class="">Open</a>
                                        <a href="{{route('user.ticket.filter', ['status' => 1])}}" class="">Answered</a>
                                        <a href="{{route('user.ticket.filter', ['status' => 2])}}" class="">Replied</a>
                                        <a href="{{route('user.ticket.filter', ['status' => 3])}}" class="">Closed</a>
                                    </div>
                                </div>

                                @if (count($tickets) > 0)
                                    @foreach ($tickets as $ticket)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="mb-3 font-weight-medium ticket_title">
                                                           <a href="{{ route('user.ticket.view', $ticket->ticket) }}"> {{ $ticket->subject }}</a>
                                                        </h6>
                                                        <h6 class="ticket_created_at mb-0">
                                                            {{ $ticket->created_at->diffForHumans() }}
                                                        </h6>
                                                    </div>
                                                    <div>
                                                        @if ($ticket->status == 0)
                                                            <span class="text-danger">Open</span>
                                                        @elseif($ticket->status == 1)
                                                            <span class="text-primary">Answered</span>
                                                        @elseif($ticket->status == 2) 
                                                            <span class="text-info">Replied</span>
                                                        @elseif($ticket->status == 3) 
                                                            <span class="text-success">Closed</span>   
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>












@endsection

@push('js')

    <script>
         $('#upload').on('change', function() {
        var fileName = $(this).val().split('\\').pop(); // Get file name from the path
        $('.show-form-label').text(fileName); // Update label text with the file name
    });
        $(document).ready(function () {
            'use strict';
            $(document).on('change', '#upload', function () {
                var fileCount = $(this)[0].files.length;
                $('.select-files-count').text(fileCount + ' file(s) selected')
            })
        });

  
    </script>

@endpush
