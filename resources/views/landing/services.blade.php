@extends('landing.layouts.app')

@section('content')

{{-- <div class="container-fluid px-3 user-service-list">

    <div class="row   justify-content-between mx-lg-5">
    
    <div class="col-md-12">
    <ol class="breadcrumb center-items">
    <li><a href="{{route('user.home')}}">@lang('Home')</a></li>
    <li class="active">@lang('Service')</li>
    </ol>
    
    <div class="card my-3">
    <div class="card-body">
    <form action="{{ route('user.service.search') }}" method="get">
    <div class="row justify-content-between">
        <div class="col-md-4">
            <div class="form-group">
                <input type="text" name="service" value="{{@request()->service}}"
                        class="form-control"
                        placeholder="@lang('Search for Services')">
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="form-group">
                <select name="category" id="category" class="form-control statusfield">
                    <option value="">@lang('All Category')</option>
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}" {{($category->id == @request()->category) ? 'selected' : ''}}>@lang($category->category_title)</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <button type="submit" class="btn waves-effect waves-light w-100 btn-primary"><i
                        class="fas fa-search"></i> @lang('Search')</button>
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="row my-3 justify-content-between mx-lg-5">
    <div class="col-md-12">
    
    <div id="accordion" class="accordion-service">
    @foreach($categories as $category)
    @if( 0 < count($category->service))
    <div class="card mb-3">
        <div class="card-header" id="faqhead{{$category->id}}">
            <a href="#" class="btn btn-header-link" data-toggle="collapse"
                data-target="#faq{{$category->id}}" aria-expanded="true"
                aria-controls="faq{{$category->id}}">
                {{$category->category_title }}
            </a>
        </div>
        <div id="faq{{$category->id}}" class="collapse @if($loop->first) show @endif"
                aria-labelledby="faqhead{{$category->id}}" data-parent="#accordion">
            <div class="card-body">
                <div class="table-responsive ">
                    <table class="categories-show-table table  table-striped text-dark">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">@lang('ID')</th>
                            <th scope="col" class="text-left">@lang('Name')</th>
                            <th scope="col"
                                class="text-center">@lang('Rate Per 1k')</th>
                            <th scope="col" class="text-center">@lang('Min')</th>
                            <th scope="col" class="text-center">@lang('Max')</th>
                            <th scope="col" class="text-center">@lang('Description')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category->service as $service)
                            <tr>
                                <td data-label="@lang('ID')"
                                    class="text-center">{{$service->id}}</td>
                                <td data-label="@lang('Name')" class="text-left">
                                    @lang($service->service_title)
                                </td>
                                <td data-label="@lang('Rate Per 1k')" class="text-right">
                                    @lang(config('basic.currency_symbol')){{$service->user_rate ?? $service->price}}
                                </td>
                                <td data-label="@lang('Min')" class="text-center">
                                    @lang($service->min_amount)
                                </td>
                                <td data-label="@lang('Max')" class="text-center">
                                    @lang($service->max_amount)
                                </td>
    
                                <td data-label="@lang('Description')" class="text-center">
                                    <button type="button"
                                            class="btn btn-default btn-sm text-dark"
                                            data-toggle="modal"
                                            data-target="#description" id="details"
                                            data-id="{{$service->id}}"
                                            data-servicetitle="{{$service->service_title}}"
                                            data-description="{{$service->description}}">
                                        <i class="fa fa-eye"></i> @lang('More')</button>
                                </td>
    
                            </tr>
    
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
    </div>
    
    @endif
    @endforeach
    </div>
    </div>
    </div>
    
    
    </div>
    
    <div class="modal fade" id="description">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header modal-colored-header bg-primary">
    <h4 class="modal-title" id="title"></h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    
    <div class="modal-body" id="servicedescription">
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
    <a href="" type="submit" class="btn btn-primary order-now">@lang('Order Now')</a>
    </div>
    
    </div>
    </div>
    </div> --}}
<main class="noAuths">
<div id="top_services">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card card_v2">
<div class="card-body">
<div class="row">
<div class="col-md-12">

</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="row">
<div class="col-md-6">
<div class="drop_dwon_menu" id="cat_filter">
<div class="text_filter">
<button class="btn mr-2 cat_btn_filter mb-sm-2" id="catFilter" onclick="showCatDrop()">
<i class="fas fa-filter"></i> Filter By Category
<i class="fas fa-sort-down"></i>
</button>
</div>
<div class="all_btn_cat_wrap" id="catList">
<button onclick="allCat()" class="mk-icons">All</button>
@foreach($categories as $category)
@if( 0 < count($category->service))
<button class="mk-icons" onclick="filterNow($category->id)">
{{$category->category_title}}
</button>
@endif
@endforeach
</div>
</div>
</div>
{{-- <div class="col-md-6">
    <ul id="currency_changer">
    <li>
    <div class="dropdown ">
    <button class="btn btn-primary dropdown-toggle mb-sm-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="currencyToggler">
    <span>
    BRL R$
    </span>
    <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" id="currencies-list">
    <li>
    <a class="dropdown-item" href="#" id="currencies-item" data-rate-key="USD" data-rate-symbol="$">USD
    $</a>
    </li>

    </ul>
    </div>
    </li>
    </ul>
</div> --}}

</div>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="text" class="form-control" placeholder="Search" id="search">
<span class="input-group-btn">
<button type="button" class="btn btn-default" data-filter-serch-btn="true">
<i class="fa fa-search" aria-hidden="true"></i>
</button>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<section id="table" class="services_page">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="responsive-table def_table">
<div class="table-responsive">
@foreach($categories as $category)
@if( 0 < count($category->service))
<table class="table" id="service-table">
    <thead class="category_filterable category45599">
        <tr class="catetitle" data-category="Instagram Followers [ UPDATED ]">
            <td colspan="8">
            <strong>Instagram Followers [ UPDATED ]</strong>
            </td>
        </tr>
        <tr data-category="Instagram Followers [ UPDATED ]">
            <th>ID</th>
            <th>Service</th>
            <th>Rate per 1000</th>
            <th>Min order</th>
            <th>Max order</th>
            <th class="nowrap">Average time
            <span class="fa fa-exclamation-circle" data-toggle="tooltip" data-placement="top" title="The average time is based on 10 latest completed orders per 1000 quantity."></span>
            </th>
                <th>Description</th>
            <th>Order</th>
        </tr>
    </thead>

<tbody class="category_filterable category{{$category->id}}">
    @foreach($category->service as $service)
    <tr data-filter-table-category-id="{{$category->id}}">

        <td data-filter-table-service-id="{{$service->id}}">
        <span style="display: none;" id="servis_id">{{$service->id}}</span>                                                2708
        </td>

        <td class="service-name" id="serv_name_{{$service->id}}" data-filter-table-service-name="true">
        {{$service->service_title}}
        </td>
        <td>
        <span data-toggle="tooltip" data-placement="top" title="$1.50">${{$service->user_rate ?? $service->price}}</span>
        </td>

        <td>
        {{$service->min_amount}}
        </td>
        <td>
        {{$service->max_amount}}
        </td>

        <td>
        <span class="average-time ser-id-2708"> Not enough data</span>
        </td>

        <td>
        <a href="javascript:void(0)" class="btn btn-primary btn_serv btn_detail" onclick="showDetails({{$service->id}},{{$service->user_rate ?? $service->price}},{{$service->min_amount}},{{$service->max_amount}})">View Details</a>
        <span id="serv_details-{{$service->id}}" class="hidden">Start: 0-1H <br>
        Speed: 20k-30k/Day <br>
        Refill: No Refill <br>
        Quality: Real</span>
        </td>
        <td>
        <a href="{{route('user.order.create')}}?serviceId={{$service->id}}" class="btn btn-primary btn_serv">
        <i class="fas fa-shopping-cart"></i> 
        </a>
        </td>
    </tr>
   @endforeach 
</tbody>
</table>
@endif
@endforeach
</div>
</div>
</div>
</div>
</div>
</section>

<script>
const searchBox = document.getElementById("search");
function btnFltr(getDataNow) {
searchBox.value = "";
searchBox.value = getDataNow.getAttribute("data-value");
searchServices();
}

function allSearch(){
const searchBox3 = document.getElementById("search");
searchBox3.value = "";
const itemHidden = document.getElementsByClassName('category_filterable');
for(const item of itemHidden){
item.classList.remove('hidden');
}
searchServices();
}
// Search Function
function searchServices() {
var searchTerm = $("#search").val();
var listItem = $('#service-table tbody').children('tr');
var searchSplit = searchTerm.replace(/ /g, "'):containsi('");

$.extend($.expr[':'], {'containsi': function(elem, i, match, array) {
return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
}
});

$("#service-table tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
$(this).addClass('hidden');
});

$("#service-table thead").not(":containsi('" + searchSplit + "')").each(function(e){
$(this).addClass('hidden');
});


$("#service-table tbody tr:containsi('" + searchSplit + "')").each(function(e){
$(this).removeClass('hidden');
});

$("#service-table thead:containsi('" + searchSplit + "')").each(function(e){
$(this).removeClass('hidden');
});


$("tr.separator:first-child, tr.separator:last-child").each(function(e) {
$(this).removeClass('hidden');
});
}

//  Category FIlter 
const currencyToggler = document.getElementById('currencyToggler');
currencyToggler.addEventListener('click', function(e){
const currenciesMenu = document.getElementById('currencies-list');
currenciesMenu.classList.toggle('openNow');
});

function showCatDrop(){
const filterList = document.getElementById('catList');
filterList.classList.toggle('openFilter');
}

function filterNow(id,e){
allSearch();
const targetTable = 'category'+id;
const itemShowed = document.getElementsByClassName(targetTable);
const allTable =  document.getElementsByClassName('category_filterable');

for (const tableItem of allTable) {
tableItem.classList.add("hidden");
}

for(const tableshowed of itemShowed){
tableshowed.classList.remove('hidden');
}
showCatDrop();
}

function allCat(){
allSearch();
const allTable =  document.getElementsByClassName('category_filterable');
for (const tableItem of allTable) {
tableItem.classList.remove("hidden");
}

showCatDrop();
}


function allCat2(){
const allTable =  document.getElementsByClassName('category_filterable');
for (const tableItem of allTable) {
tableItem.classList.remove("hidden");
}
}
</script>



<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" id="servDescriptionDialog">
<div class="modal-content">
<div class="modal-body">
<div class="services_more">
<div class="servicesHead">
<div class="serv_id_wrap">
<span id="servId"></span>
</div>
<div class="servName"> <span id="serv_names"></span></div>
</div>
<button type="button" class="serv_modal_close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
<div id="serv_details">

</div>
<div class="serv_more_infos">
<div class="ser_more_item">
<div class="serv_more_icon">
<i class="fas fa-water-lower"></i>
</div>
<div class="more_infos">
<h5>Min Order</h5>
<span id="minOrder"></span>
</div>
</div>

<div class="ser_more_item">
<div class="serv_more_icon">
<i class="fas fa-water-rise"></i>
</div>
<div class="more_infos">
<h5>Max Order</h5>
<span id="maxOrder"></span>
</div>
</div>

<div class="ser_more_item">
<div class="serv_more_icon">
<i class="far fa-usd-circle"></i>
</div>
<div class="more_infos">
<h5>Price Per 1000</h5>
<span id="pricePer"></span>
</div>
</div>
</div>

<div class="buyNOwBtn">
<a id="buyNow"><i class="fas fa-cart-plus"></i> Buy Now</a>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Script For Show Details -->


<!-- Fav and Notificaion Codes -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>

var dataUrl = "https://perfectapp.serveravatartmp.com/api/favorite/app";
var fetchUrl = "https://perfectapp.serveravatartmp.com/api/favorite";
var userId = ;
var user_name = "";


$(document).ready(function(){

//Setting Hightlight
$.post(fetchUrl, {"action":"get_all_favorite", "user_id":userId, "username":user_name}, function(response){
if (response.result == "success") {
favServices = response.data.favorite;
hightLightFavorite(favServices);
}
});

//adding to favorite
$('.fav').click(function(){
var status = $(this).data('status');
var sId = parseInt($(this).data('id'));
$(this).html('<img class="img_ajax" src="https://yourperfectapp.com/jap/images/ajax.gif">');
doUpdateFavorite(this,status,userId,sId,user_name,dataUrl);
});

});


// Doing Favorites Functions
function doUpdateFavorite(obj,status,uid,sid,username,dataUrl){
var action = "";
if(status){
action = "remove_fav";
}else{
action = "add_to_fav";
}

$.post(dataUrl, {"action":action, "user_id":uid, "service_id":sid, "username":username}, function(response) {
$('.img_ajax').remove();
if(response.result == "success") {
console.log(response.message);
if(!status){
$(obj).html("<i class='fas fa-star'></i>");
$(obj).data("status",1);
}else{
$(obj).html("<i class='far fa-star'></i>");
$(obj).data("status",0);
}
} else {
console.warn(response.message);
}
});
}


// Hightlight Favorite Functions
function hightLightFavorite(data) {
$('.fav').each(function () {
var id = parseInt($(this).data('id'));
if(data.indexOf(id.toString()) != -1){
$(this).html("<i class='fas fa-star'></i>");
$(this).data("status", 1);
} else {
$(this).html("<i class='far fa-star'></i>");
$(this).data("status", 0);
}
})
}

</script>


<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" id="servDescriptionDialog">
<div class="modal-content">
<div class="modal-body">
<div class="services_more">
<div class="servicesHead">
<div class="serv_id_wrap">
<span id="servId"></span>
</div>
<div class="servName"> <span id="serv_names"></span></div>
</div>
<button type="button" class="serv_modal_close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
<div id="serv_details">

</div>
<div class="serv_more_infos">
<div class="ser_more_item">
<div class="serv_more_icon">
<i class="fas fa-water-lower"></i>
</div>
<div class="more_infos">
<h5>Min Order</h5>
<span id="minOrder"></span>
</div>
</div>

<div class="ser_more_item">
<div class="serv_more_icon">
<i class="fas fa-water-rise"></i>
</div>
<div class="more_infos">
<h5>Max Order</h5>
<span id="maxOrder"></span>
</div>
</div>

<div class="ser_more_item">
<div class="serv_more_icon">
<i class="far fa-usd-circle"></i>
</div>
<div class="more_infos">
<h5>Price Per 1000</h5>
<span id="pricePer"></span>
</div>
</div>
</div>

<div class="buyNOwBtn">
<a id="buyNow"><i class="fas fa-cart-plus"></i> Buy Now</a>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Script For Show Details -->
<script>
function showDetails(id,min,max,price){
let servDes = `serv_details-${id}`;
let servTitle = `serv_name_${id}`;
let getDesc = document.getElementById(servDes).innerHTML;
let getTitle = document.getElementById(servTitle).innerHTML;

let placeServtitle = document.getElementById('serv_names');
let placeServDes = document.getElementById('serv_details');
let placeServId = document.getElementById('servId');
let placeMinOrder = document.getElementById('minOrder');
let placeMaxOrder = document.getElementById('maxOrder');
let placePricePer = document.getElementById('pricePer');
let placeBuyNow = document.getElementById('buyNow');

let makeurl = `{{route('user.order.create')}}?serviceId=${id}`;

placeServId.innerHTML = `#${id}`;
placeMinOrder.innerHTML = `${min}`;
placeMaxOrder.innerHTML = `${max}`;
placePricePer.innerHTML = `${price}`;
placeServtitle.innerHTML = `${getTitle}`;
placeServDes.innerHTML = `${getDesc}`;
placeBuyNow.setAttribute("href", makeurl);
$('#detailsModal').modal('show');
}
</script>

</main>
@endsection