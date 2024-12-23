@extends('user.layouts.app')
@section('content')

<!-- Main variables *content* -->
<!-- filter section start -->
<section>
    <div class="container">
        <div class="mt-3">
            <div class="">
                <form action="{{ route('user.order.search') }}" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="order_id" value="{{@request()->order_id}}"
                                       class="form-control"
                                       placeholder="@lang('Order ID')">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="service" value="{{@request()->service}}"
                                       class="form-control get-service"
                                       placeholder="@lang('Service')">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="status" class="form-control">
                                    <option value="-1"  @if(@request()->status == '-1') selected @endif>@lang('All')</option>
                                    <option value="pending" @if(@request()->status == 'pending') selected @endif>@lang('Pending')</option>
                                    <option value="progress" @if(@request()->status == 'progress') selected @endif>@lang('In Progress')</option>
                                    <option value="completed" @if(@request()->status == 'completed') selected @endif>@lang('Completed')</option>
                                    <option value="partial" @if(@request()->status == 'partial') selected @endif>@lang('Partial')</option>
                                    <option value="processing" @if(@request()->status == 'processing') selected @endif>@lang('Processing')</option>
                                    <option value="canceled" @if(@request()->status == 'canceled') selected @endif>@lang('Cancelled')</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date_time" id="datepicker"/>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn waves-effect waves-light w-100 btn-primary-new"><i
                                        class="fas fa-search"></i> @lang('Search')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="order" class="mt-md-3">
    <div class="container">
        <div class="row">
            
            <div class="col-12">
                <div id="order_filter" class="order_filter_n">
                    <div class="order_filter_btn">
                        @php
                          $lastSegment = collect(request()->segments())->last();
                        @endphp
                        <a class="order_btn @if(Request::routeIs('user.order.index') || Request::routeIs('user.order.search') ) order_btn_active @endif" href="{{ route('user.order.index') }}">@lang('All')</a>
                        {{-- <a class="order_btn  {{( $lastSegment == 'awaiting') ? 'order_btn_active' : '' }}" href="{{ route('user.order.status.search',['awaiting']) }}">@lang('Awaiting')</a> --}}
                        <a class="order_btn {{( $lastSegment == 'pending') ? 'order_btn_active' : '' }}" href="{{ route('user.order.status.search',['pending']) }}">@lang('Pending')</a>
                        
                        <a class="order_btn {{( $lastSegment == 'progress') ? 'order_btn_active' : '' }}" href="{{ route('user.order.status.search',['progress']) }}">@lang('In progress')</a>
                        <a class="order_btn  {{( $lastSegment == 'completed') ? 'order_btn_active' : '' }}" href="{{ route('user.order.status.search',['completed']) }}">@lang('Completed')</a>
                        <a class="order_btn {{( $lastSegment == 'partial') ? 'order_btn_active' : '' }}" href="{{ route('user.order.status.search',['partial']) }}">@lang('Partial')</a>
                        <a class="order_btn {{( $lastSegment == 'processing') ? 'order_btn_active' : '' }}" href="{{ route('user.order.status.search',['processing']) }}">@lang('Processing')</a>
                        <a class="order_btn {{( $lastSegment == 'canceled') ? 'order_btn_active' : '' }}" href="{{ route('user.order.status.search',['canceled']) }}">@lang('Canceled')</a>
                    </div>

                    {{-- <div class="order_search">
                        <form action="/orders" method="get" id="history-search">
                            <input
                                    type="text"
                                    placeholder="Search"
                                    value=""
                                    name="search"
                            />
                            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </span>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- filter section end-->

<!-- servcie List start -->
<section id="order_List">
    <div class="container">
            <div class="" id="order_list_wrapper">
                <!-- service list heading  -->{{-- 
                <div class="order_list_heading">
                    
                </div> --}}
                <div class="table-responsive">
                    <table class="new_table text-center">
                        <thead class="order_list_heading_new">
                        <tr>
                            <th>@lang('ID')</th>
                            <th>@lang('Date')</th>
                            <th>@lang('Link')</th>
                            <th>@lang('Charge')</th>
                            <th>@lang('Start Count')</th>
                            <th>@lang('Quantity')</th>
                            <th>@lang('Service')</th>
                            <th>@lang('Remains')</th>
                            <th>@lang('Action')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Order')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $key => $order)
                            <tr>
                                <td> {{$order->id}} </td>
                                <td>@lang(dateTime($order->created_at, 'd/m/Y - h:i A' ))</td>
                                <td class="text-left pl-2">@lang($order->link ?? 'N/A')</td>
                                <td>@lang($order->price ?? 'N/A')</td>
                                <td>@lang($order->start_counter ?? 'N/A')</td>
                                <td>@lang($order->quantity ?? 'N/A')</td>
                                <td class="text-left">@lang(optional($order->service)->service_title)</td>
                                <td>@lang($order->remains ?? 'N/A')</td>
                                <td><a href="{{route('user.order.destroy', $order->id)}}">Delete</a></td>
                                <td>
                                    @if($order->status=='awaiting')
                                        <span
                                            class="badge badge-pill badge-danger">{{trans('Awaiting')}}</span>
                                    @elseif($order->status == 'pending')
                                        <span
                                            class="badge badge-pill badge-info">{{trans('Pending')}}</span>
                                    @elseif($order->status == 'processing')
                                        <span
                                            class="badge badge-pill badge-info">{{trans('Processing')}}</span>
                                    @elseif($order->status == 'progress')
                                        <span
                                            class="badge badge-pill badge-warning">{{trans('In progress')}}</span>
                                    @elseif($order->status == 'completed')
                                        <span
                                            class="badge badge-pill badge-success">{{trans('Completed')}}</span>
                                    @elseif($order->status == 'partial')
                                        <span
                                            class="badge badge-pill badge-warning">{{trans('Partial')}}</span>
                                    @elseif($order->status == 'canceled')
                                        <span
                                            class="badge badge-pill badge-danger">{{trans('Canceled')}}</span>
                                    @elseif($order->status == 'refunded')
                                        <span
                                            class="badge badge-pill badge-danger">{{trans('Refunded')}}</span>
                                    @endif

                                    @if(isset($order->refill_status) && ($order->refill_status != 'completed' || $order->refill_status != 'partial' || $order->refill_status != 'canceled' || $order->refill_status != 'refunded'))
                                        <p class="badge badge-pill badge-warning">{{trans('Refilling')}}</p>
                                    @endif
                                </td>
                                <td>

                                    @if(optional($order->service)->service_status == 1)
                                        <button type="button"
                                                class="btn btn-sm btn-success orderBtn" data-toggle="modal"
                                                data-target="#description" id="details"
                                                data-service_id="{{$order->service_id}}"
                                                data-servicetitle="{{optional($order->service)->service_title}}"
                                                data-description="{{optional($order->service)->description}}"
                                                title="@lang('Order')"
                                        >
                                            <i class="fa fa-cart-plus"></i>
                                        </button>
                                    @endif

                                    @if($order->reason)
                                        <button type="button"
                                                data-reason="{{$order->reason}}"
                                                class="btn btn-sm btn-info infoBtn" data-toggle="modal"
                                                data-target="#infoModal"
                                                title="@lang('Reason')"
                                        ><i class="fa fa-info"></i>
                                        </button>
                                    @endif


                                    @if($order->status == 'completed' && 0 < $order->remains   && optional($order->service)->refill == 1 &&  ($order->refilled_at == null || Carbon\Carbon::parse($order->refilled_at) < Carbon\Carbon::now()->subHours(24)) && (!isset($order->refill_status)  || $order->refill_status == 'completed' || $order->refill_status == 'partial' || $order->refill_status == 'canceled' || $order->refill_status == 'refunded'))
                                        <button type="button"
                                                data-toggle="modal"
                                                data-target="#refillModal"
                                                class="btn btn-sm btn-info refilOrderBtn"
                                                data-route="{{ route('user.order.refill',[$order->id])}}"
                                                title="@lang('Refill')">
                                            <i class="fas fa-undo-alt"></i>
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center text-danger">@lang('No Data found')</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $orders->appends($_GET)->links() }}
                </div>
            </div>
       
    </div>
</section>

<!-- servcie List end -->


<section class="paginations_global">
</section>



<!-- Notifications wrapper -->
<div id="notify-wrapper" class="alert alert-success hidden" style="display: none;"></div>


<div id="infoModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h5 class="modal-title">@lang('Note')</h5>
                <button type="button" class="close new-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="info-reason"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn waves-effect waves-light btn-dark btn-new-close"
                        data-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="title"></h4>
                <button type="button" class="close new-close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="servicedescription">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer modal-footer-new">
                <button type="button" class="btn btn-new-close" data-dismiss="modal">@lang('Close')</button>
                <a href="" type="submit" class="btn btn-new-order order-now">@lang('Order Now')</a>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="refillModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h5 class="modal-title">@lang('Order Refill Confirm')</h5>
                <button type="button" class="close new-close" data-dismiss="modal" aria-label="Close">
                    &times;
                </button>
            </div>

            <div class="modal-body">
                <p>@lang("Are you really want to refill this orders")</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-new-close" data-dismiss="modal"><span>@lang('No')</span></button>
                <form action="" method="post" id="refillConfirm">
                    @csrf
                    @method('put')

                    <button type="submit" class="btn btn-new-order"><span>@lang('Yes')</span>
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- Trigger Button -->






@push('js')
    <script>
        'use strict';
        $(document).on('click', '.infoBtn', function () {
            var modal = $('#infoModal');
            var id = $(this).data('service_id');
            var orderRoute = "{{route('user.order.create')}}" + '?serviceId=' + id;
            $('.order-now').attr('href', orderRoute);
            modal.find('.info-reason').html($(this).data('reason'));
        });

        $(document).on('click', '#details', function () {
            var title = $(this).data('servicetitle');
            var id = $(this).data('service_id');

            var orderRoute = "{{route('user.order.create')}}" + '?serviceId=' + id;
            $('.order-now').attr('href', orderRoute);

            var description = $(this).data('description');
            $('#title').text(title);
            $('#servicedescription').text(description);
        });

        $(document).on('click', '.refilOrderBtn', function () {
            let route = $(this).data('route');
            $('#refillConfirm').attr('action', route);
        });

        $('#description').on('hidden.bs.modal', function () {
            $('#title').text(''); // Clear title
            $('#servicedescription').text(''); // Clear description
            $('#order-now-link').attr('href', ''); // Reset link
        });
    </script>

<!-- Modal JavaScript -->
<script>
    (function ($) {
        'use strict';

        // Modal functionality
        var Modal = function (element) {
            this._element = element;
        };

        Modal.prototype.show = function () {
            var $element = $(this._element);
            $element.addClass('show').show();
            $element.trigger('shown.bs.modal');
        };

        Modal.prototype.hide = function () {
            var $element = $(this._element);
            $element.removeClass('show').hide();
            $element.trigger('hidden.bs.modal');
        };

        // jQuery plugin
        $.fn.modal = function (action) {
            return this.each(function () {
                var data = $(this).data('bs.modal');
                if (!data) {
                    data = new Modal(this);
                    $(this).data('bs.modal', data);
                }
                if (typeof action === 'string') {
                    data[action]();
                }
            });
        };

        // Event handlers
        $(document).on('click', '[data-toggle="modal"]', function (e) {
            var target = $($(this).data('target'));
            target.modal('show');
        });

        $(document).on('click', '[data-dismiss="modal"]', function (e) {
            var target = $(this).closest('.modal');
            target.modal('hide');
        });
    })(jQuery);
</script>


@endpush
@endsection
