@extends('landing.layouts.app')

@section('content')
<main class="noAuths">
<main>
    <section id="heroSection">
        <div class="container">
            <div class="row g-lg-0 gy-5 align-items-center">
                @if(isset($templates['forget-password'][0]) && $content = $templates['forget-password'][0])
                <div class="col-lg-6">
                    <div class="text-box">
                        <h4>@lang(@$content->description->title)</h4>
                        <p>{!! __($content->description->description) !!}</p>
                    </div>
                </div>
                @endif
    
                <div class="col-lg-6">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
    
                    <form method="POST" action="{{ route('password.email') }}" class="form-content w-100">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <h4>@lang('Reset Password')</h4>
                            </div>
    
                            <div class="input-box col-12">
                                <input class="form-control" type="email" name="email" value="{{old('email')}}"
                                placeholder="@lang('Enter Your Email Address')">
                                @error('email')
                                    <p class="text-danger mt-1">@lang($message)</p>
                                @enderror
                            </div>
                        </div>
    
                        <button type="submit" class="btn reset_btn my-3">@lang('Send Password Reset Link')</button>
                        <div class="bottom">
                            @lang('Don\'t have account?')
                             <a href="{{ route('register') }}">@lang('Register here')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



</main>
</main>






<div class="integration-fixed integration-fixed__bottom-right">
<style>
    .whatsapp-button {
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF !important;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none !important;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        transition: all 0.3s ease;
        transform: scale(0.9)
    }

    .whatsapp-button svg {
        fill: #fff;
    }

    .whatsapp-button:hover {
        transform: scale(1);
        background-color: #1fcc5f;
    }
    .reset_btn {
    border: 1px solid var(--v3-primary-gradient);
    height: 44px;
    color: #fff;
    font-weight: 400;
    background: var(--v3-primary-gradient);
    border-radius: 5px;
}
</style>
<div class="whatsapp-container">
    <a href="https://api.whatsapp.com/send?phone=917866939776" target="_blank" class="whatsapp-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="26">
            <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
        </svg>
    </a>
</div></div>

<style>.particle-snow{position:fixed;top:0;left:0;width:100%;height:100%;z-index:1;pointer-events:none}.particle-snow canvas{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none}.christmas-garland{text-align:center;white-space:nowrap;overflow:hidden;position:absolute;z-index:1;padding:0;pointer-events:none;width:100%;height:85px}.christmas-garland .christmas-garland__item{position:relative;width:28px;height:28px;border-radius:50%;display:inline-block;margin-left:20px}.christmas-garland .christmas-garland__item .shape{-webkit-animation-fill-mode:both;animation-fill-mode:both;-webkit-animation-iteration-count:infinite;animation-iteration-count:infinite;-webkit-animation-name:flash-1;animation-name:flash-1;-webkit-animation-duration:2s;animation-duration:2s}.christmas-garland .christmas-garland__item .apple{width:22px;height:22px;border-radius:50%;margin-left:auto;margin-right:auto;margin-top:8px}.christmas-garland .christmas-garland__item .pear{width:12px;height:28px;border-radius:50%;margin-left:auto;margin-right:auto;margin-top:6px}.christmas-garland .christmas-garland__item:nth-child(2n+1) .shape{-webkit-animation-name:flash-2;animation-name:flash-2;-webkit-animation-duration:.4s;animation-duration:.4s}.christmas-garland .christmas-garland__item:nth-child(4n+2) .shape{-webkit-animation-name:flash-3;animation-name:flash-3;-webkit-animation-duration:1.1s;animation-duration:1.1s}.christmas-garland .christmas-garland__item:nth-child(odd) .shape{-webkit-animation-duration:1.8s;animation-duration:1.8s}.christmas-garland .christmas-garland__item:nth-child(3n+1) .shape{-webkit-animation-duration:1.4s;animation-duration:1.4s}.christmas-garland .christmas-garland__item:before{content:"";position:absolute;background:#222;width:10px;height:10px;border-radius:3px;top:-1px;left:9px}.christmas-garland .christmas-garland__item:after{content:"";top:-9px;left:14px;position:absolute;width:52px;height:18px;border-bottom:solid #222 2px;border-radius:50%}.christmas-garland .christmas-garland__item:last-child:after{content:none}.christmas-garland .christmas-garland__item:first-child{margin-left:-40px}</style>
@endsection