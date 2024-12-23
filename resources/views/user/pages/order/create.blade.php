@extends('user.layouts.app')
@section('content')

		<!-- Main variables *content* -->
        <section class="hero">
            
              <div class="container">
                <div id="hero-banner">
            <div class="container-new">
             
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="row" id="banner_layout">
                  <div class="col-12 col-lg-4 hero_left">
                    <h2 class="heading">
                      Welcome back, <labe class="heading_label">{{Auth::user()->username}}</labe>
                    </h2>
                    <p>
                      We are here to give you the best service. Growfollows provide high-quality services only.
                    </p>
                    <div id="hero-pay">
                      <div class="hero_pay_left">
                        <div class="hero_pay_content">
                          <div class="icon">
                            <iconify-icon icon="mingcute:wallet-3-fill"></iconify-icon>
                          </div>
                          <p>Your balance</p>
                        </div>
                        
                        <h3>
                          @if (Auth::user()->balance > 0)
                          {{Auth::user()->balance}}
                          @else
                          0
                          @endif
                         </h3>
                      </div>
                      <div class="pay_line"></div>
                      <div class="hero_pay_right">
                        <div class="hero_pay_content">
                          <!-- logo  -->
                          <div class="icon">
                            <iconify-icon icon="healthicons:money-bag"></iconify-icon>
                          </div>
                          <p>Total Spend</p>
                        </div>
                         @php
                         $fund = App\Models\Fund::where('user_id', Auth::user()->id)->first();
                         @endphp
                        <h3>
                          @if ($fund && $fund->amount !== null && Auth::user()->balance !== null)
                          {{ sprintf('%.2f', round($fund->amount - Auth::user()->balance, 2)) }}
                          @else
                          0
                          @endif
                        </h3>
                      </div>
                    </div>
                  </div>
          
                  <div class="col-12 col-lg-2 hero_middle">
                    <h2>NEW User</h2>
                  </div>
          
                  <div class="col-12 col-lg-2 hero_right">
                    <div class="hero_right_card mr-10">
                      <div class="hero_right_card_one">
                        <div class="card_img">
                          <iconify-icon icon="solar:cart-4-bold-duotone"></iconify-icon>
                        </div>
                        <div>
                          @php
                          $order = App\Models\Order::where('user_id', Auth::user()->id)->count();
                          @endphp
                          <h3>
                            @if ($order > 0)
                            {{ $order }}
                            @else
                            0
                            @endif
                          </h3>
                          <p>Total Orders</p>
                        </div>
                      </div>
                      {{-- <div class="hero_right_card_Two">
                        <div class="card_img">
                          <iconify-icon icon="solar:layers-line-duotone"></iconify-icon>
                        </div>
                        <div>
                          <h3>Points</h3>
                          <div class="card_two_paragrap">
                            <p class="card_two_para">$-/100</p>
                            <p class="card_two_para">0&nbsp;≈&nbsp;N/A$</p>
                          </div>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                  <div class="col-12 col-lg-2 hero_right">
                    <div class="hero_right_card mr-10">
                      <div class="hero_right_card_one">
                        <div class="card_img">
                          <iconify-icon icon="solar:cart-4-bold-duotone"></iconify-icon>
                        </div>
                        <div>
                          @php
                          /* $order = App\Models\Order::where('user_id', Auth::user()->id)->count(); */
                          @endphp
                          <h3>
                          {{--   @if ($order > 0)
                            {{ $order }}
                            @else
                            0
                            @endif --}}
                            0
                          </h3>
                          <p>Total Points</p>
                        </div>
                      </div>
                      {{-- <div class="hero_right_card_Two">
                        <div class="card_img">
                          <iconify-icon icon="solar:layers-line-duotone"></iconify-icon>
                        </div>
                        <div>
                          <h3>Points</h3>
                          <div class="card_two_paragrap">
                            <p class="card_two_para">$-/100</p>
                            <p class="card_two_para">0&nbsp;≈&nbsp;N/A$</p>
                          </div>
                        </div>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </section>
          
          
          
          <div class="my-3">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="alert alert-info">
                    {{-- @foreach($categories as $category)
                        <button id="category" class="btn border-btn">{{$category->category_title}}</button>
                    @endforeach --}}
                    <div id="category-buttons">
                      @foreach($categories as $category)
                          <button 
                              type="button" 
                              class="btn border-btn category-btn" 
                              data-category-id="{{ $category->id }}"
                              @if(old('category') == $category->id || (isset($selectService) && $selectService->category_id == $category->id))   
                              @endif
                          >
                              @lang($category->category_title)
                          </button>
                      @endforeach
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- order-section start -->
          <section class="order-section">
            <div class="container">
              <div id="order-section">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-12" id="order_sec_left">
                    <div class="card mb-3 card_type_1">
                      <div class="card-header">
                        <ul class="nav nav-pills nav_menu_card" id="pills-tab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button
                              class="nav-link active"
                              id="pills-order-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-order"
                              type="button"
                              role="tab"
                              aria-controls="pills-order"
                              aria-selected="true"
                            >
                              <div class="icon">
                                <iconify-icon icon="mdi:cart"></iconify-icon>
                              </div>
                              <div class="text">
                                New order
                              </div>
                            </button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button
                              class="nav-link"
                              id="pills-massorder-tab"
                              data-bs-toggle="pill"
                              data-bs-target="#pills-massorder"
                              type="button"
                              role="tab"
                              aria-controls="pills-massorder"
                              aria-selected="false"
                              onclick="window.location.href='/massorder'"
                            >
                             <div class="icon">
                              <iconify-icon icon="fluent:box-checkmark-24-filled"></iconify-icon>
                             </div>
                             <div class="text">
                              Mass Order
                             </div>
                            </button>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                          <div
                            class="tab-pane fade show active"
                            id="pills-order"
                            role="tabpanel"
                            aria-labelledby="pills-order-tab"
                            tabindex="0"
                          >
                        <!-- New Order Form -->
                        <form class="form" method="post" action="{{route('user.order.store')}}"
                                      enctype="multipart/form-data">
                                      
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label" for="category_id">@lang('Category')</label>
                                        <select id="category" class="form-control" name="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : (isset($selectService) && $selectService->category_id == $category->id ? 'selected ' : '')  }}>@lang($category->category_title)</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category'))
                                            <div class="error text-danger">@lang($errors->first('category')) </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label " for="service">@lang('Service')</label>
                                        <select id="service" class="form-control" name="service">
                                        </select>
                                        @if($errors->has('service'))
                                            <div class="error text-danger">@lang($errors->first('service'))</div>
                                        @endif
                                    </div>

                                    <div class="form-group ">
                                        <label>@lang('Link')</label>
                                        <input type="text" name="link" value="{{ old('link') }}"
                                               placeholder="www.example.com/your_profile_identity" class="form-control">
                                        @if($errors->has('link'))
                                            <div class="error text-danger">@lang($errors->first('link'))</div>
                                        @endif
                                    </div>
                                    <div class="form-group ">
                                        <label>@lang('Quantity')</label>
                                        <input type="number" name="quantity" id="quantity"
                                               value="{{ old('quantity') }}"
                                               class="form-control">
                                        @if($errors->has('quantity'))
                                            <div class="error text-danger"> @lang($errors->first('quantity')) </div>
                                        @endif
                                    </div>

                                    <div class="form-group drip_feed"
                                         style="{{ old('runs') || old('interval')  || $errors->has('runs') || $errors->has('interval') ? '' : 'display: none;' }}">
                                        <label>@lang('Drip-feed')</label>
                                        <div class="custom-switch-btn w-md-25">
                                            <input type="checkbox" name="drip_feed"
                                                   class="custom-switch-checkbox dripfeed"
                                                   id="status"
                                                   value="0" {!!  old('runs') || old('interval') || $errors->has('runs') || $errors->has('interval') ? '' : 'checked="false"' !!}>
                                            <label class="custom-switch-checkbox-label" for="status">
                                                <span class="custom-switch-checkbox-inner"></span>
                                                <span class="custom-switch-checkbox-switch"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="drip_feed_check"
                                         style="{{ old('runs') || old('interval')  || $errors->has('runs') || $errors->has('interval') ? '' : 'display: none;' }}">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group drip_feed">
                                                    <label>@lang('Runs')</label>
                                                    <input type="number" id="runs" name="runs" class="form-control"
                                                           value="{{ old('runs') }}">
                                                    @if($errors->has('runs'))
                                                        <div class="error text-danger">@lang($errors->first('runs'))</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group drip_feed">
                                                    <label>@lang('Interval (in minutes)')</label>
                                                    <input type="number" name="interval" class="form-control"
                                                           value="{{ old('interval') }}">
                                                    @if($errors->has('interval'))
                                                        <div class="error text-danger">@lang($errors->first('interval'))</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group drip_feed">
                                            <label>@lang('Total Quantity')</label>
                                            <input type="text" class="form-control total_quantity" name="total_quantity"
                                                   value="{{ (old('runs')) * (old('quantity')) }}"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group price">
                                                <label>@lang('Price')</label>
                                                <input type="hidden" class="price_per">
                                                <input type="number" id="price" name="price" class="form-control"
                                                       disabled>
                                            </div>
                                        </div>
                                    </div>
                                   {{--  <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="agree" name="check">
                                        <label class="form-check-label"
                                               for="agree">@lang('Yes, i have confirmed the order!')</label>
                                        @if($errors->has('check'))
                                            <div class="error text-danger">@lang($errors->first('check')) </div>
                                        @endif
                                    </div> --}}
                                    <div class="submit-btn-wrapper text-center text-md-left">
                                        <button type="submit"
                                                class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3 place_order">
                                            <span>@lang('Place Order')</span></button>
                                    </div>
                                </form>
          
                        <!-- ##### New Order Form -->
                        </div>
                          <div
                            class="tab-pane fade"
                            id="pills-massorder"
                            role="tabpanel"
                            aria-labelledby="pills-massorder-tab"
                            tabindex="0"
                          >
                          <div class="alert alert-danger">
                            Redirecting to Mass Order Page, Please wait...
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
          
                    <div class="col-lg-6 col-md-12 col-12" id="order_sec_right">
                      <div class="card mb-3 card_type_1">
                        <div class="card-header">
                          <ul class="nav nav-pills justify-content-between nav_menu_card" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button
                                class="nav-link active"
                                id="pills-details-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-details"
                                type="button"
                                role="tab"
                                aria-controls="pills-details"
                                aria-selected="true"
                              >
                              <div class="icon">
                                <iconify-icon icon="tabler:settings"></iconify-icon>
                              </div>
                              <div class="text">
                                Service details
                              </div>
                              </button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button
                                class="nav-link"
                                id="pills-contact-tab"
                                data-bs-toggle="pill"
                                data-bs-target="#pills-contact"
                                type="button"
                                role="tab"
                                aria-controls="pills-contact"
                                aria-selected="false"
                              >
                              <div class="icon">
                                <iconify-icon icon="f7:envelope-fill"></iconify-icon>
                              </div>
                              <div class="text">
                                Contact Us
                              </div>
                              </button>
                            </li>
                          </ul>
                        </div>
                        <div class="card-body">
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-details" role="tablpanel" aria-label="pills-contact-tab">
                                    <div class="order-des-item">
                                        <label>Service name</label>
                                        <p class="service_x_name"></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="order-des-item">
                                              <label>Min Amount</label>
                                              <p class="minimum_amount"></p>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="order-des-item">
                                              <label>Max Amount</label>
                                              <p class="maximum_amount"> </p>
                                          </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="order-des-item">
                                              <label>Price per 1k</label>
                                              <p class="price_x_per"> </p>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="order-des-item">
                                      <label>Description</label>
                                      <p class="description"> </p>
                                    </div>
                             </div>
                             <div class="tab-pane fade" id="pills-contact" role="tablpanel" aria-label="pills-contact-tab">
                              <div class="alert alert-success mb-4">
                                 Need Help? We are always ready to help you in any of your needs! <br>
                                 Choose the best way to get in touch and we'll contact you ASAP!
                              </div>
                              <div class="support__item  mb-4">
                                 <h4><i class="fas fa-headset"></i> Support Ticket <small>(easiest &amp; fastest)</small></h4>
                                 <a href="{{ route('user.ticket.create') }}" class="btn btn-primary">Open Ticket Now</a>
                              </div>
                              <div class="support__item  mb-4">
                                 <h4> <i class="fab fa-whatsapp"></i> Whatsapp Live Chat (Avarage Response 1H-3H)</h4>
                                 {{-- <a href="https://api.whatsapp.com/send?phone=447380800689" target="_blank" class="btn btn-primary">Chat Now</a> --}}
                                 <a href="https://t.me/YourUsername" target="_blank" class="btn btn-primary">Chat Now</a>
                              </div>
                              <div class="support__item  mb-4">
                                 <h4><i class="fas fa-envelope"></i> Email Support</h4>
                                 <a href="mailto:support@smmbd.com" class="btn btn-primary">support@smmbd.com</a>
                              </div>
                           </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </section>
          <!-- order-section end -->
          
          
                          <!-- Notifications wrapper -->
                  <div id="notify-wrapper" class="alert alert-success hidden" style="display: none;"></div>
          
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
          
                <div class="modal-body">
                    <div class="row">
                      <div class="col-xs-8 col-md-4"><span style="color:purple;"><h6>Notification Center</h6></span></div>
                      <div class="col-xs-8 col-md-4 pull-right"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></div>
                    </div>
                  <hr>
                    <div class="main-notification">
          
          
          <h2 class="heading bordered c-b" style="font-family: Poppins, sans-serif; font-weight: 600; line-height: 1.2; color: rgb(54, 38, 130); margin: 0px 0px 30px; font-size: 49px; padding: 0px 0px 35px; text-align: center; position: relative; background-color: rgb(247, 247, 247);">What We Offer Now</h2><p><span style="background-color: rgb(247, 247, 247); color: rgb(63, 59, 80); font-family: Poppins, sans-serif; font-size: 18px; text-align: center;">?Date: 7 June 2021
          ID:51 - Facebook Page Likes + Followers [Bangladesh] [Non Drop] R30 ✅ 1000/1.84$
          ID:52 - Facebook Fanpage Likes + Followers [Bangladesh] [5K-10K / Day] R45 ✅ 1000/2.28$
          ID:53 - Facebook Fanpage Likes + Followers [Bangladesh] [10K-15K / Day] R60✅ 1000/2.63$
          ID:54 - Facebook Fanpage Likes + Followers [Bangladesh] [10K-15K / Day] LIFETIME Refill✅ 1000/3$
          
                             </span><img src="https://cdn.mypanel.link/770smr/7ztdb2bb3ep6oboi.png" style="display: inline-block; width: 275px; max-width: 100%;" class="img-responsive"><b><br></b></p><p><br></p>
          
          
                    </div>
                  </div>
          
              </div>
            </div>
          </div>
@endsection
@push('js')
    <script>
        "use strict";
        $(document).ready(function () {
            var catId = "{{ old('category', $selectService->category_id ?? '') }}";
            if (catId) {
                getService(catId);
            }
            $(document).on('change', '#category', function (e) {
                var cat_id = $('option:selected', this).val();
                getService(cat_id);
            });
            $(document).on('click', '.category-btn', function () {
                var cat_id = $(this).data('category-id');
                getService(cat_id);
                $('#category').val(cat_id);
            });
            $(document).on('change', '#service', function () {
                var ser_id = $('option:selected', this).val();
                getServiceDetails(ser_id)
            });

            function getService(cat_id) {
                $.ajax({
                    url: "{{ route('user.service') }}",
                    type: "POST",
                    data: {cat_id: cat_id},
                    success: function (data) {
                        $('#service').html('');
                        if (data.length) {
                            var serviceId = "{{old('service', $selectService->id ?? '')}}";
                            if (!serviceId) {
                                $('#service').append('<option value="" disabled>Select Service</option>');
                            }
                            $(data).each(function (key, val) {
                                if (serviceId == val.id) {
                                    $('#service').append('<option value="' + val.id + '" selected>' + val.service_title + '</option>');
                                    $('.price_per').val(val.price);
                                    $('.service_x_name').html(val.service_title);
                                    $('.minimum_amount').val('$'+val.min_amount);
                                    $('.maximum_amount').val('$'+val.max_amount);
                                    $('.price_x_per').html('$'+val.price);
                                    $('.description').html(val.description);
                                } else {
                                    $('#service').append('<option value="' + val.id + '">' + val.service_title + '</option>');
                                    $('.price_per').val(val.price);
                                    $('.service_x_name').html(val.service_title);
                                    $('.minimum_amount').html('$'+val.min_amount);
                                    $('.maximum_amount').html('$'+val.max_amount);
                                    $('.price_x_per').html('$'+val.price);
                                    $('.description').html(val.description);
                                }
                            });
                            if (serviceId) {
                                getServiceDetails(serviceId);
                            }
                        }
                    }
                })
            }

            function getServiceDetails(ser_id) {
                $.ajax({
                    type: "get",
                    data: {ser_id: ser_id},
                    url: "{{ route('user.service_id') }}",
                    success: function (data) {

                        var price = (data.user_rate) ? data.user_rate : data.price;

                        $('.service_name').html(data.service_title);
                        $('.minimum_amount').val(data.min_amount);
                        $('.maximum_amount').val(data.max_amount);
                        $('.price_per').val(price);
                        $('.description').html(data.description);

                        if (data.drip_feed == 0) {
                            $('.drip_feed').css("display", "none");
                        } else {
                            $('.drip_feed').css("display", "block");
                        }
                        updatePrice();
                    }
                });
            }

            var total = 1;
            $(document).on('change keyup', '#quantity, #runs', function () {
                var quan = parseInt($('#quantity').val());
                var run = parseFloat($('#runs').val());
                var total = quan * run;
                $('.total_quantity').val(total);

            });

            $(document).on('change click', '#status', function () {
                var re = $('#status').is(":checked");
                if (re == true) {
                    $('.drip_feed_check').css("display", "none");
                } else {
                    $('.drip_feed_check').css("display", "block");
                }
            });

            $(document).on('change keyup', '#quantity', function () {
                updatePrice()
            });

            function updatePrice() {
                var quan = parseInt($('#quantity').val());
                var pri = parseFloat($('.price_per').val());
                var total = ((quan / 1000) * pri).toFixed({{ $basic->fraction_number }});
                $('#price').val(total);
            }
        });
    </script>
@endpush