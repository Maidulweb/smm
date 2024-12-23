@extends('user.layouts.app')
@section('title')
    @lang('Api')
@endsection
@section('content')

    @auth
        <div class="container">

            <div class="row my-3">
                <div class="col-md-12">
                    <div class="card api-details">
                        <h5 class="card-title text-white">@lang('API Key')
                            <button type="button" class="btn btn-default btn-sm  text-white float-right  waves-effect generateBtn"><i
                                    class="fa fa-spinner"></i> @lang('Generate Key')</button>
                        </h5>
                        <div class="card-body">

                            <div class="form-group content">
                                <h6 class="font-weight-bold mb-1">@lang('API KEY')</h6>
                                <div class="input-group">
                                    <input type="text" value=""
                                           class="form-control form-control-lg api-token" id="referralURL"
                                           readonly>
                                    <div class="input-group-append">
                                    <span class="input-group-text copytext copyBoard" id="copyBoard">
                                            <i class="fa fa-copy"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endauth

    <!--API DETAILS-->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card api-details">
                    <h5 class="card-title text-white">@lang('API DETAILS')</h5>
                    <div class="card-body content">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>@lang('API URL')</h6>
                                <p>{{ route('userApiKey') }}</p>
                            </div>
                            <div class="col-sm-12">
                                <h6>@lang('API KEY')</h6>
                                <p>
                                    @lang('Your API Key')
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <h6>@lang('HTTP METHOD')</h6>
                                <p>@lang('POST')</p>
                            </div>
                            <div class="col-sm-3">
                                <h6>@lang('RESPONSE FORMAT')</h6>
                                <p>@lang('JSON')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--PLACE NEW ORDER-->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card api-details mb-0">
                    <h5 class="card-title text-white">@lang('PLACE NEW ORDER')</h5>
                    <div class="card-body content">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('key')</h6>
                                <p>@lang('Your API key')</p>
                            </div>
                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('action')</h6>
                                <p>
                                    @lang('add')
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('service')</h6>
                                <p>@lang('Service ID')</p>
                            </div>
                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('link')</h6>
                                <p>@lang('Link to page')</p>
                            </div>

                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('quantity')</h6>
                                <p>@lang('Needed quantity')</p>
                            </div>

                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('runs')
                                    <small class="text-muted">@lang('(optional)')</small>
                                </h6>
                                <p>@lang('Runs to deliver')</p>
                            </div>

                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('interval')
                                    <small class="text-muted">@lang('(optional)')</small>
                                </h6>
                                <p>@lang('Interval in minutes')</p>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="api-code mt-2 mb-5">
                    <p class="text-success">//Example response</p>
                    <pre class="text-white">
{
    "status": "success",
    "order": 116
}
</pre>
                </div>
            </div>
        </div>
    </div>

    <!--STATUS ORDER-->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card api-details mb-0">
                    <h5 class="card-title text-white">@lang('STATUS ORDER')</h5>
                    <div class="card-body content">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('key')</h6>
                                <p>@lang('Your API key')</p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('action')</h6>
                                <p>
                                    @lang('status')
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('order')</h6>
                                <p>@lang('Order ID')</p>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="api-code mt-2 mb-5">
                    <p class="text-success">//Example response</p>
                    <pre class="text-white">
{
    "status": "Processing",
    "charge": "3.60",
    "start_count": 0,
    "remains": 0,
    "currency": "BDT"
}
</pre>
                </div>

            </div>
        </div>
    </div>



    <!--MULTIPLE STATUS ORDER-->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card api-details mb-0">
                    <h5 class="card-title text-white">@lang('MULTIPLE STATUS ORDER')</h5>
                    <div class="card-body content">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('key')</h6>
                                <p>@lang('Your API key')</p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('action')</h6>
                                <p>
                                    @lang('orders')
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('orders')</h6>
                                <p>@lang('Order IDs separated by comma (array data)')</p>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="api-code mt-2 mb-5">
                    <p class="text-success">//Example response</p>
                    <pre class="text-white">[
    {
        "order": 116,
        "status": "Processing",
        "charge": "3.60",
        "start_count": 10,
        "remains": 0
    },
    {
        "order": 117,
        "status": "Completed",
        "charge": null,
        "start_count": 0,
        "remains": 0
    }
]</pre>
                </div>

            </div>
        </div>
    </div>

    <!--CREATE REFILL-->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card api-details mb-0">
                    <h5 class="card-title text-white">@lang('PLACE REFILL')</h5>
                    <div class="card-body content">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('key')</h6>
                                <p>@lang('Your API key')</p>
                            </div>
                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('action')</h6>
                                <p>
                                    @lang('refill')
                                </p>
                            </div>
                            <div class="col-sm-3">
                                <h6 class="text-lowercase">@lang('order')</h6>
                                <p>@lang('Order ID')</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="api-code mt-2 mb-5">
                    <p class="text-success">//Example response</p>
                    <pre class="text-white">
{
    "refill": "1"
}
</pre>
                </div>
            </div>
        </div>
    </div>

    <!--STATUS REFILL-->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card api-details mb-0">
                    <h5 class="card-title text-white">@lang('STATUS REFILL')</h5>
                    <div class="card-body content">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('key')</h6>
                                <p>@lang('Your API key')</p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('action')</h6>
                                <p>
                                    @lang('refill_status')
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('refill')</h6>
                                <p>@lang('Refill ID')</p>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="api-code mt-2 mb-5">
                    <p class="text-success">//Example response</p>
                    <pre class="text-white">
{
    "status": "Completed"
}
</pre>
                </div>

            </div>
        </div>
    </div>

    <!--SERVICE LIST-->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card api-details mb-0">
                    <h5 class="card-title text-white">@lang('SERVICE LIST')</h5>
                    <div class="card-body content">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('key')</h6>
                                <p>@lang('Your API key')</p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('action')</h6>
                                <p>
                                    @lang('services')
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="api-code mt-2 mb-5">
                    <p class="text-success">//Example response</p>
                    <pre class="text-white">[
    {
        "service": 1,
        "name": "🙋‍♂️ Followers [Ultra-High Quality Profiles]",
        "category": "🥇 [VIP]\r\n",
        "rate": "4.80",
        "min": 100,
        "max": 10000
    },
    {
        "service": 11,
        "name": "🧨 Instagram Power Comments (100k+ Accounts) ➡️ [3 Comments]",
        "category": "💬 Instagram - Verified / Power Comments [ Own Service ]",
        "rate": "0.60",
        "min": 500,
        "max": 5000
    },
    {
        "service": 52,
        "name": "🎙️ Facebook Live Stream Views ➡️ [ 120 Min ]",
        "category": "🔵 Facebook - Live Stream Views\r\n",
        "rate": "57.60",
        "min": 50,
        "max": 2000
    }
]</pre>
                </div>

            </div>
        </div>
    </div>


    <!--USER BALANCE-->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <div class="card api-details mb-0">
                    <h5 class="card-title text-white">@lang('USER BALANCE')</h5>
                    <div class="card-body content">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('key')</h6>
                                <p>@lang('Your API key')</p>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="text-lowercase">@lang('action')</h6>
                                <p>
                                    @lang('balance')
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="api-code mt-2 mb-5">
                    <p class="text-success">//Example response</p>
                    <pre class="text-white">
{
  "status": "success",
  "balance": "0.03",
  "currency": "USD"
}
</pre>
                </div>

            </div>
        </div>
    </div>


@endsection



@push('js')

    <script>
        "use strict";
        $('.copyBoard').on('click',function () {
            var copyText = document.getElementById("referralURL");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            /*For mobile devices*/
            document.execCommand("copy");
            Notiflix.Notify.Success("Copied: " + copyText.value);
        });
        $('.generateBtn').on('click', function () {
            $.ajax({
                url: "{{route('user.keyGenerate')}}",
                type: 'POST',
                success(data) {
                    $("#referralURL").val(data)

                    Notiflix.Notify.Success("KEY GENERATE: " + data);

                }
            });
        });

    </script>
@endpush
