@extends('user.layouts.app')
@section('title')
    @lang('Dashboard')
@endsection
@section('content')
    <div class="container">
        <div class="row mt-4 mb-2 admin-fa_icon">

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card shadow ">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-between">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="mb-1 font-weight-medium"><sup class="set-doller">{{config('basic.currency_symbol')}}</sup>{{getAmount($walletBalance)}}
                                    </h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">@lang('Your Balance')</h6>
                            </div>

                            <div class=" mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fa fa-suitcase fa-2x"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-between">
                            <div>
                                <h2 class="mb-1 w-100 text-truncate font-weight-medium">{{number_format($totalTrx)}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">@lang('Total Transaction')
                                </h6>
                            </div>

                            <div class=" mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-exchange-alt fa-2x"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-between">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="mb-1 font-weight-medium"><sup class="set-doller">{{config('basic.currency_symbol')}}</sup>{{getAmount($totalDeposit)}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">@lang('Total Deposit')</h6>
                            </div>

                            <div class=" mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-money-bill-alt fa-2x"></i></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-between">
                            <div>
                                <h2 class="mb-1 font-weight-medium">{{getAmount($ticket)}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">@lang('Total Tickets')</h6>
                            </div>

                            <div class="mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-ticket-alt fa-2x"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-between">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="mb-1 font-weight-medium">{{getAmount($order['total'])}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">@lang('Total Orders')</h6>
                            </div>

                            <div class=" mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fab fa-first-order fa-2x"></i></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-between">
                            <div>
                                <h2 class="mb-1 font-weight-medium">{{getAmount($order['processing'])}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">@lang('Processing Orders')</h6>
                            </div>

                            <div class=" mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fab fa-first-order fa-2x"></i></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-between">
                            <div>
                                <h2 class="mb-1 font-weight-medium">{{getAmount($order['pending'])}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">@lang('Pending Orders')</h6>
                            </div>

                            <div class=" mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-spinner fa-2x"></i></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center justify-content-between">
                            <div>
                                <h2 class="mb-1 font-weight-medium">{{getAmount($order['completed'])}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">@lang('Completed Orders')</h6>
                            </div>

                            <div class=" mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i class="fas fa-check fa-2x"></i></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body ">
                        <h4 class="card-title">@lang('Latest Transaction')</h4>

                        <div class="table-responsive">
                            <table class="table  table-hover table-striped " id="service-table">
                                <thead class="ca">
                                <tr>
                                    <th >@lang('Transaction ID')</th>
                                    <th >@lang('Amount')</th>
                                    <th >@lang('Remarks')</th>
                                    <th>@lang('Time')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td data-label="@lang('Transaction ID')">@lang($transaction->trx_id)</td>
                                        <td data-label="@lang('Amount')">
                                        <span
                                            class="font-weight-bold text-{{($transaction->trx_type == "+") ? 'success': 'danger'}}">{{($transaction->trx_type == "+") ? '+': '-'}}{{getAmount($transaction->amount, config('basic.fraction_number')). ' ' . trans(config('basic.currency'))}}</span>
                                        </td>
                                        <td data-label="@lang('Remarks')"> @lang($transaction->remarks)</td>
                                        <td data-label="@lang('Time')">
                                            {{ dateTime($transaction->created_at, 'd M Y h:i A') }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')

@endpush
