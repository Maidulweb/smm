@extends('user.layouts.app')
@section('content')
<style>
    #instruction_instruction {
        display: none;
    }
</style>
<section class="mt-md-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- Add Fund Section -->
            <div class="col-lg-6 col-md-6 col-12 mb-3">
                <div class="card card_type_1">
                    <div class="card-header">
                        <ul class="nav nav-pills nav_menu_card" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="pills-addfund-tab" data-bs-toggle="pill" data-bs-target="#pills-addfund" type="button" role="tab">
                                    <div class="icon">
                                        <iconify-icon icon="fluent:wallet-credit-card-48-regular"></iconify-icon>
                                    </div>
                                    <div class="text">Add Fund</div>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="pills-trnx-tab" data-bs-toggle="pill" data-bs-target="#pills-trnx" type="button" role="tab">
                                    <div class="icon">
                                        <iconify-icon icon="carbon:cics-transaction-server-zos"></iconify-icon>
                                    </div>
                                    <div class="text">Transactions</div>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Add Fund Tab -->
                            <div class="tab-pane fade show active" id="pills-addfund" role="tabpanel">
                                <div class="dropdown">
                                    @php
                                        $firstGateway = $gateways->first();
                                    @endphp
                                    <button class="btn btn-new-n display-block dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <span id="selected-method">{{ $firstGateway->name ?? 'Select Method' }}</span>
                                    </button>
                                    <ul class="dropdown-menu gateway_ul">
                                        @foreach($gateways as $gateway)
                                        <input type="hidden" class="name_new" value="{{$gateway->name}}">
                                        <li class="gateway_li">
                                            {{-- <img src="{{ getFile(config('location.gateway.path').$gateway->image)}}" alt="{{$gateway->name}}" class="gateway">  --}}
                                            <button type="button" 
                                                class="dropdown-item select-method addFund" 
                                                data-id="{{$gateway->id}}"
                                                data-name="{{$gateway->name}}"
                                                data-currency="{{$gateway->currency}}"
                                                data-gateway="{{$gateway->code}}"
                                                data-min_amount="{{getAmount($gateway->min_amount, $basic->fraction_number)}}"
                                                data-max_amount="{{getAmount($gateway->max_amount, $basic->fraction_number)}}"
                                                data-percent_charge="{{getAmount($gateway->percentage_charge, $basic->fraction_number)}}"
                                                data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}"
                                                onclick="selectMethod(this)">
                                                {{$gateway->name}}
                                            </button>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                                {{-- <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">Method</button>
                                    <ul class="dropdown-menu gateway_ul">
                                        @foreach($gateways as $gateway)
                                        <input type="hidden" class="name_new" value="{{$gateway->name}}">
                                        <li class="gateway_li">
                                            @dd(getFile(config('location.gateway.path')))
                                            <img src="{{ getFile(config('location.gateway.path').$gateway->image)}}" alt="{{$gateway->name}}" class="gateway"> 
                                            <button type="button" 
                                                class="dropdown-item select-method addFund" 
                                                data-id="{{$gateway->id}}"
                                                data-name="{{$gateway->name}}"
                                                data-currency="{{$gateway->currency}}"
                                                data-gateway="{{$gateway->code}}"
                                                data-min_amount="{{getAmount($gateway->min_amount, $basic->fraction_number)}}"
                                                data-max_amount="{{getAmount($gateway->max_amount, $basic->fraction_number)}}"
                                                data-percent_charge="{{getAmount($gateway->percentage_charge, $basic->fraction_number)}}"
                                                data-fix_charge="{{getAmount($gateway->fixed_charge, $basic->fraction_number)}}">
                                                {{$gateway->name}}
                                            </button>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div> --}}
                                {{-- <p class="text-danger depositLimit"></p>
                                <p class="text-danger depositCharge"></p> --}}
                                <p class="text-danger">Transaction Limit: $10.00 - $10,000.00 Charge: $0.00 +</p>
                                <input type="hidden" class="form-control gateway" name="gateway">
                                <div class="form-group">
                                    <div id="amount-fields" style="display: flex;">
                                      <div style="flex: 1 1 0%;">
                                        <label for="amount" class="control-label"><span id="amount_label">Amount</span> <span id="amount_label_currency" class="">, USD</span></label>
                                        <input type="text" inputmode="decimal" class="form-control" name="AddFoundsForm[amount]" id="amount2" step="0.01">
                                      </div>
                                    <label id="amount-converted-icon" style="display: flex;align-items: center;margin: 0 18px;margin-bottom: -25px;" class="control-label">
                                        <i class="fas fa-exchange" style="color: currentColor;"></i>
                                    </label>
                                    <div id="amount-converted" style="flex: 1 1 0%;">
                                        <label for="amount-converted-input" class="control-label">
                                            Amount, BDT
                                        </label>
                                        <input readonly type="text" inputmode="decimal" class="form-control amount" name="amount" id="amount-converted-input">
                                    </div>
                                   </div>
                                  </div>
                                {{-- <div class="form-group">
                                    <label for="amount" class="control-label">Amount</label>
                                    <input type="text" inputmode="decimal" class="form-control amount" name="amount" id="amount">
                                </div> --}}
                                <button type="button" class="btn btn-primary checkCalc">Check</button>
                            </div>

                            <!-- Transactions Tab -->
                            <div class="tab-pane fade" id="pills-trnx" role="tabpanel">
                                @if ($transactions->count() > 0)
                                            <table class="table">
                                                <thead>
                                                    <th>Trx ID</th>
                                                    <th>Amount</th>
                                                    <th>Charge</th>
                                                    <th>Remark</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($transactions as $transaction)
                                                    <tr>
                                                        <td>{{$transaction->trx_id}}</td>
                                                        <td>{{$transaction->trx_type}}{{number_format($transaction->amount, 2)}}</td>
                                                        <td>{{number_format($transaction->charge, 2)}}</td>
                                                        <td>{{$transaction->remarks}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                       
                                    @else
                                    <div class="alert alert-info">No Transactions Found.</div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Info Section -->
            <div class="col-lg-6 col-md-6 col-12 mb-3">
                <div class="card card_type_1">
                    <div class="card-body">
                        <div class="payment-info text-center">
                            <img id="loading" src="{{asset('assets/images/loading.gif')}}" alt="" class="d-none" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('js')
<script>
    /* $(document).ready(function () {
        // Dropdown Method Selection
        $('.select-method').on('click', function () {
            const selectedText = $(this).text();
            $('#dropdownMenuButton').text(selectedText);

            const gatewayData = $(this).data();
            $('.depositLimit').text(`Transaction Limit: $${gatewayData.min_amount} - $${gatewayData.max_amount} `);
            $('.depositCharge').text(`Charge: $${gatewayData.fix_charge}  + ${(gatewayData.percent_charge > 0 ? gatewayData.percent_charge + '%' : '')}`);
            $('.gateway').val(gatewayData.gateway);
        });

        // Check Calculation
        $('.checkCalc').on('click', function () {
            $('#loading').removeClass('d-none');

            const amount = $('.amount').val();
            const gateway = $('.gateway').val();
            const gateway_name_new = $('.name_new').val();

            $.ajax({
                url: "{{route('user.addFund.request')}}",
                type: 'POST',
                data: { amount, gateway,gateway_name_new },
                success: function (data) {
                    $('.payment-info').html(`
                        <ul class="list-group text-center">

                            <li class="list-group-item">Gateway: <strong>${gateway_name_new}</strong></li>
                            <li class="list-group-item">Amount: <strong>${data.amount}</strong></li>
                            <li class="list-group-item">Charge: <strong>${data.charge}</strong></li>
                            <li class="list-group-item">Payable: <strong>${data.payable}</strong></li>
                            <li class="list-group-item">Conversion Rate: <strong>${data.conversion_rate}</strong></li>
                            ${(data.isCrypto ? `<li class="list-group-item">${data.conversion_with}</li>` : '')}
                            <li class="list-group-item">
                                <a href="${data.payment_url}" class="btn btn-primary">Pay Now</a>
                            </li>
                        </ul>
                    `);
                },
                complete: function () {
                    $('#loading').addClass('d-none');
                },
                error: function (err) {
                    alert('Error occurred. Please try again.');
                }
            });
        });
    }); */
$(document).ready(function () {
    // Automatically select the first gateway and show data
    const firstMethod = $('.select-method').first();
    const firstGatewayData = firstMethod.data();
    
    // Set default button text
    $('#dropdownMenuButton').text(firstMethod.text());

    // Display default gateway details
    $('.depositLimit').text(`Transaction Limit: $${firstGatewayData.min_amount} - $${firstGatewayData.max_amount}`);
    $('.depositCharge').text(`Charge: $${firstGatewayData.fix_charge} + ${(firstGatewayData.percent_charge > 0 ? firstGatewayData.percent_charge + '%' : '')}`);
    $('.gateway').val(firstGatewayData.gateway);

    // Dropdown Method Selection
    $('.select-method').on('click', function () {
        const selectedText = $(this).text();
        $('#dropdownMenuButton').text(selectedText);

        const gatewayData = $(this).data();
        $('.depositLimit').text(`Transaction Limit: $${gatewayData.min_amount} - $${gatewayData.max_amount}`);
        $('.depositCharge').text(`Charge: $${gatewayData.fix_charge} + ${(gatewayData.percent_charge > 0 ? gatewayData.percent_charge + '%' : '')}`);
        $('.gateway').val(gatewayData.gateway);
    });

    // Check Calculation
    $('.checkCalc').on('click', function () {
        $('#loading').removeClass('d-none');

        const amount = $('.amount').val();
        const gateway = $('.gateway').val();
        const gateway_name_new = $('.name_new').val();

        $.ajax({
            url: "{{route('user.addFund.request')}}",
            type: 'POST',
            data: { amount, gateway, gateway_name_new },
            success: function (data) {
                $('.payment-info').html(`
                    <ul class="list-group text-center">
                        <li class="list-group-item">Gateway: <strong>${gateway_name_new}</strong></li>
                        <li class="list-group-item">Amount: <strong>${data.amount}</strong></li>
                        <li class="list-group-item">Charge: <strong>${data.charge}</strong></li>
                        <li class="list-group-item">Payable: <strong>${data.payable}</strong></li>
                        <li class="list-group-item">Conversion Rate: <strong>$1 = 118BDT</strong></li>
                        <li class="list-group-item">
                            <a href="${data.payment_url}" class="btn btn-primary">Pay Now</a>
                        </li>
                    </ul>
                `);
            },
            complete: function () {
                $('#loading').addClass('d-none');
            },
            error: function (err) {
                alert('Insufficient Balance');
            }
        });
    });
});

     $(document).ready(function () {
        
        const exchangeRate = 118;

        
        $('#amount2').on('input', function () {
            const usdAmount = parseFloat($(this).val());
            if (!isNaN(usdAmount)) {
              
                const bdtAmount = (usdAmount * exchangeRate).toFixed(2);
               
                $('#amount-converted-input').val(bdtAmount);
               /*  $('#amount').val(bdtAmount); */
            } else {
               
                $('#amount-converted-input').val('');
                /* $('#amount').val(''); */
            }
        });
    }); 

   


    function selectMethod(button) {
    const methodName = button.getAttribute('data-name');
    document.getElementById('selected-method').textContent = methodName;
}

</script>
@endpush
@endsection
