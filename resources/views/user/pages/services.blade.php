@extends('user.layouts.app')
@section('content')
<!-- filter section start -->
<section id="service_filter" class="mt-md-5 mt-5"></section>
<!-- filter section end-->
<!-- servcie List start -->
<section id="service_List">
   <div class="container">
         <div  id="service_List_Wrapper">
            <!-- service list heading  -->
            <div class="service_list_heading">
               <div class="sl">
                  <h4>ID</h4>
               </div>
               <div class="title">
                  <h4>Service</h4>
               </div>
               <div class="shop_logo"></div>
               <div class="rate">
                  <h4>Rate/1000</h4>
               </div>
               <div class="min_max">
                  <h4>Min/Max</h4>
               </div>
               {{-- <div class="refill">
                  <h4>Refill</h4>
               </div>
               <div class="time">
                  <h4>Average time</h4>
               </div> --}}
               <div class="desc">
                  <h4>Description</h4>
               </div>
            </div>
            @foreach($categories as $category)
             @if( 0 < count($category->service))

             <div
               class="service_list_title"
               data-filter-table-category-id="{{$category->id}}"
               >
               <div class="server_title_wrapper">
                  <p>{{$category->category_title }}</p>
               </div>
            </div>
            <!-- data list  -->
            @foreach($category->service as $service)
            <div
               class="service_list"
               data-filter-table-category-id="45442"
               >
               <div class="sl" data-filter-table-service-id="{{$service->id}}">
                  <span
                     role="button"
                     data-favorite-service-id="{{$service->id}}"
                     >
                  <span
                     data-favorite-icon
                     class="far fa-star"
                     ></span>
                  </span>
                  <h4>{{$service->id}}</h4>
               </div>
               <div class="title service-name" data-filter-table-service-name="true">
                  <h4 id="serv_name_{{$service->id}}">{{$service->service_title}}</h4>
               </div>
               <div class="shop_logo">
                  <button
                     href="javascript:void(0)"
                     onclick="showDetails('{{$service->id}}','500','1 000 000', '$0.40')"
                     >
                     <iconify-icon icon="mdi:cart"></iconify-icon>
                  </button>
                  <span id="serv_details-{{$service->id}}" class="hidden"
                     >{{$service->description}}</span
                     >
                 {{--  <a
                     class="logo_wrap"
                     href="https://growfollows.com/?service={{$service->id}}"
                     >
                     <iconify-icon icon="mdi:cart"></iconify-icon>
                  </a> --}}
               </div>
               <div class="rate">
                  <h4>
                    {{$service->user_rate ?? $service->price}}        
                  </h4>
               </div>
               <div class="min_max">
                  <h4>@lang($service->min_amount) / @lang($service->max_amount)</h4>
               </div>
               {{-- <div class="refill">
                  <button>
                  {{$service->refill == 1 ? 'Refill' : 'No Refill'}}
                  </button>
               </div>
               <div class="time">
                  <h4>Not enough data</h4>
               </div> --}}
               <div class="desc">
                  <button
                     href="javascript:void(0)"
                     onclick="showDetails('{{$service->id}}','500','1 000 000', '$0.40')"
                     >
                  Details
                  </button>
                  <span id="serv_details-{{$service->id}}" class="hidden"
                     >{{$service->description}}</span
                     >
               </div>
            </div>

@endforeach
            @endif
            @endforeach

         </div>
   </div>
</section>
<!-- servcie List end -->
@endsection