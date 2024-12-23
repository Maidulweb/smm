@extends('landing.layouts.app')

@section('content')
<main class="noAuths">
<main>
    <section id="heroSection">

        <img src="landing_asset/images/banner_left_image.webp" class="img-fluid hero_left_image" alt="">
        <img src="landing_asset/images/banner-right-image.webp" class="img-fluid hero_right_image"
                alt="">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="banner_top_content">
                        <h1 class="text-center">
                            We are best <br>
                            Social Media
                            <span class="text-gradient">Services Main Provider.</span>
                        </h1>
                        <p class="text-center">
                            SMM BD is a Social Media Marketing tools for you. The use of social media platforms
                            such as <strong>Instagram, Facebook, Twitter, Youtube</strong> and many more to promote
                            yourself or your
                            company.
                        </p>
                        <div class="banner_button_wrap text-center">
                            <a href="#signup" class="btn btn-primary btn-filled">Get Started</a>
                            <a href="#" class="btn btn-primary btn-outline">Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
            @guest
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12"></div>
                <div class="col-lg-6 col-md-12 col-12">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li class="list-unstyled">
                                        {{ $error }}
                                        </li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

                    @error('message')
                        <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                            {{ trans($message) }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror

                    <form  method="post" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        
                        <div class="signin_wraper">
                            <h4 class="text-gradient text-center">Sign In</h4>


                            <div class="form-group">
                                <label for="username">Username</label>
                            {{--  <input type="text" name="LoginForm[username]" placeholder="Enter your username" id="username"
                                        class="form-control"> --}}
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Enter your username">
                            </div>

                            <div class="form-group">
                                <div class="password__label">
                                    <label for="password">Password</label>
                                    <a href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                                <div class="password-input">
                                {{--  <input type="password" id="password" name="LoginForm[password]" placeholder="Enter your password" id="password" class="form-control"> --}}
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                    
                                    <button class="eye-btn" id="passwordBtn" type="button" onclick="passwordViewer('password', 'passwordBtn')">
                                    <span class="eye-open">
                                        <iconify-icon icon="quill:eye"></iconify-icon>
                                    </span>
                                    <span class="eye-close">
                                        <iconify-icon icon="quill:eye-closed"></iconify-icon>
                                    </span>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group form-check">
                                <label for="rememberme" class="text-normal">
                                    <input type="checkbox" class="form-check-input" id="rememberme"  name="LoginForm[remember]" value="1" chekced>
                                    Remember Me
                                </label>
                            </div>
                            <input type="hidden" name="_csrf" value="NeYiedN0IGW3sLP5vtg_8E_9OywyhemqrrPMsLmG3YQMhH03kU1iCfPD5ZeJunG9OMQDFWTXm9nG5IfHwfOw0g==">

                            <div class="form-group">
                                <button class="btn btn-primary btn-filled w-100" type="submit">
                                    Sign in
                                </button>
                            </div>

                            <div class="separator mb-2">OR</div>

                            <center>
                                <div class="my-3">
                                    <div id="g_id_onload"
                                            data-client_id="662175147434-atdruora3e0mgr1q80829qq9gatp2qis.apps.googleusercontent.com"
                                            data-login_uri="/confirm_signup"
                                            data-auto_prompt="false"
                                            data-_csrf="NeYiedN0IGW3sLP5vtg_8E_9OywyhemqrrPMsLmG3YQMhH03kU1iCfPD5ZeJunG9OMQDFWTXm9nG5IfHwfOw0g==">
                                    </div>
                                    <div class="g_id_signin"
                                            data-type="standard"
                                            data-size="large"
                                            data-theme="outline"
                                            data-text="sign_in_with"
                                            data-shape="rectangular"
                                            data-logo_alignment="left">
                                    </div>
                                </div>
                            </center>
                            <div class="text-center">
                                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                            </div>
                        </div>
                    


                    

                </div>
                </form>
            </div>
           @endguest
        </div>
    </section>
    <!-- #### Banner Section BY YUNUS whatsapp: +8801303260848 -->

    <!-- Counter Section  BY YUNUS whatsapp: +8801303260848 -->
    <section id="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="counter_item_wraper text-center">
                        <div class="counter_icon">
                            <img src="landing_asset/images/total-completed-order.png" class="img-fluid" alt="">
                        </div>
                        <h4 class="counter_number text-center text-gradient">
                            9376794
                        </h4>
                        <p class="text-center">
                            Total Orders
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="counter_item_wraper text-center">
                        <div class="counter_icon">
                            <img src="landing_asset/images/pricing-start-from.png" class="img-fluid" alt="">
                        </div>
                        <h4 class="counter_number text-center text-gradient">
                            $0.001/1k
                        </h4>
                        <p class="text-center">
                            Price Starting
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="counter_item_wraper text-center">
                        <div class="counter_icon">
                            <img src="landing_asset/images/fastest-support.png" class="img-fluid" alt="">
                        </div>
                        <h4 class="counter_number text-center text-gradient">
                            24/7
                        </h4>
                        <p class="text-center">
                            Fastest Support
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="counter_item_wraper text-center">
                        <div class="counter_icon">
                            <img src="landing_asset/images/api-user-currently.png" class="img-fluid" alt="">
                        </div>
                        <h4 class="counter_number text-center text-gradient">
                            31064
                        </h4>
                        <p class="text-center">
                            Api Users
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ####Counter Section  BY YUNUS whatsapp: +8801303260848 -->

    <!-- Best SMM Services Sections  BY YUNUS whatsapp: +8801303260848 -->
    <section id="featuresSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="def_title_wrap text-center">
                        <p class="top-title">
                            Our Features
                        </p>
                        <h2 class="def_title">
                            Best Smm Services Providers <br> For all Social Media
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="features_item feature-first-items">
                        <div class="top_image">
                            <img src="landing_asset/images/user-friendly-dashboard.png" class="img-fluid" alt="">
                        </div>
                        <h3 class="text-gradient">
                            User Friendly <br>Dashboard
                        </h3>
                        <p>
                            SMM BD offers lightning-fast services accompanied by a feature-rich dashboard. Easily
                            manage your orders, add funds, set timers for automated orders, all accessible through a
                            unified dashboard.
                        </p>
                        <a href="#heroSection" class="btn btn-primary btn-outline">Log In Now</a>

                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="features_item">
                                <h3 class="text-gradient">
                                    Free Child Panel
                                </h3>
                                <p>
                                    Upon spending more than $2000 on HonestSMM, we provide a complimentary child
                                    panel. This enables you to resell our services on your website. To kickstart,
                                    you'll require your own domain.
                                </p>
                                <a href="#" class="btn btn-primary btn-filled">Sign Up Now</a>
                                <div class="free_child_panel_image">
                                    <img src="landing_asset/images/free-child-panel.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="features_item">
                                <h3 class="text-gradient">
                                    Cheapest Price
                                </h3>
                                <p>
                                    In the SMM market, we proudly lead as the foremost SMM panel provider. Offering
                                    competitively priced services coupled with lightning-fast support, we ensure an
                                    exceptional experience.
                                </p>
                                <a href="#" class="btn btn-primary btn-outline">Our Services</a>
                                <div class="cheapest_price_image">
                                    <img src="landing_asset/images/cheapest-price.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="features_item last__item__features">
                                <h3 class="text-gradient">
                                    Boost Your Online Business Or Social Account With US
                                </h3>
                                <p>
                                    SMM BD empowers you to amplify your social media presence and scale your
                                    business effortlessly. Experience a 100x improvement in output through our
                                    unparalleled social media services.
                                </p>
                                <a href="#" class="btn btn-primary btn-filled">About Us</a>
                                <div class="boost-your-online">
                                    <img src="landing_asset/images/boost-your-online-business.png" class="img-fluid"
                                            alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ####Best SMM Services Sections BY YUNUS whatsapp: +8801303260848 -->

    <!-- Cheapest Sections Sections  BY YUNUS whatsapp: +8801303260848 -->
    <section id="cheapestSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="def_title_wrap text-center">
                        <p class="top-title">
                            Best SMM Panel
                        </p>
                        <h2 class="def_title">
                            Cheapest & Best SMM Panel for <br>
                            <span class="text-gradient">Instagram, youtube , tiktok</span> and many more.
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="best_smm_img">
                        <img src="landing_asset/images/bestsmm-panel.webp" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="best_smm_content">
                        <h3>
                            Accelerate your growth with <br> our Honest SMM solutions
                        </h3>
                        <p>
                            You need an SMM Panel to boost your Facebook, Instagram, Twitter, YouTube, and other
                            social profiles! SMM BD is the right place for you! We will help you reach your goals
                            faster than ever before with our Cheapest SMM Reseller Panel.
                        </p>
                        <div class="best_smm_highlight">
                            <div class="highlight_item">
                                <div class="highlight_img">
                                    <img src="landing_asset/images/pin-image.png" class="img-fluid" alt="">
                                </div>
                                <h4>Fastest Support smm panel</h4>
                            </div>
                            <div class="highlight_item">
                                <div class="highlight_img">
                                    <img src="landing_asset/images/pin-image.png" class="img-fluid" alt="">
                                </div>
                                <h4>Lowest Prices smm services</h4>
                            </div>
                            <div class="highlight_item">
                                <div class="highlight_img">
                                    <img src="landing_asset/images/pin-image.png" class="img-fluid" alt="">
                                </div>
                                <h4>Tursted smm services provider</h4>
                            </div>
                            <div class="highlight_item">
                                <div class="highlight_img">
                                    <img src="landing_asset/images/pin-image.png" class="img-fluid" alt="">
                                </div>
                                <h4>Best quality smm services</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ####Cheapest Sections Sections  BY YUNUS whatsapp: +8801303260848 -->

    <!-- SEO Sections  BY YUNUS whatsapp: +8801303260848 -->
    <section id="SEO">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/best-indian-smm-panel.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                SMM Panel India
                            </h3>
                            <p>

                                SMM BD is a Worlds Provider Of SMM panel India 2024. We are the provider of the
                                Best and cheapest SMM Panel India services amongst our competitors in India with
                                Payment Method PayTM. If you are looking for the most affordable
                                promotions,SMM BD our is the right for you. We beat any price in The SMM markets.
                                You can expect Thousands of High-quality followers from us.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/smmpanel-pakisthan.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                Cheapest SMM Panel
                            </h3>
                            <p>
                                SMM BD is The Cheapest SMM Panel promotion deals are the best in The Market. We
                                must ensure that Our SMM Panel Boost Your Fan page likes, YouTube views, YouTube
                                monetization, youtube subscribers, YouTube watch hours, Telegram followers, and
                                Twitter followers, Telegram by merely purchasing us.SMM BD is a Worlds Provider
                                Of cheap Instagram panel 2024.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/smm-resellers-panel.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                Best SMM Panel
                            </h3>
                            <p>
                                We Provide Social Media Marketing services like Telegram, Twitter, YouTube, TikTok,
                                Instagram and many more SMM Services. You can pay using different payment methods
                                such as Paytm, PayPal, Credit cards, payeer, Perfect Money, Bitcoin, Direct bank
                                transfers, and many more. SMM BD is a Worlds Provider Of the fastest SMM panel
                                2024.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #### SEO Sections  BY YUNUS whatsapp: +8801303260848 -->


    <!-- Why Choose Section  BY YUNUS whatsapp: +8801303260848 -->
    <section id="whychooseus">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="why__choose__item__wrap">
                        <div class="item__lefts">
                            <div class="why__item">
                                <div class="icon">
                                    <img src="landing_asset/images/unbliveable-price.png" class="img-fluid" alt="">
                                </div>
                                <div class="text">
                                    <h4>
                                        Unbelievable Prices
                                    </h4>
                                    <p>
                                        Our prices most reasonable in the market, starting from at 0.001$.
                                    </p>
                                </div>
                            </div>
                            <div class="why__item">
                                <div class="icon">
                                    <img src="landing_asset/images/friendly-dahsboards.png" class="img-fluid" alt="">
                                </div>
                                <div class="text">
                                    <h4>Friendly Dashboard</h4>
                                    <p>
                                        SMM BD team update dashboard regularly with the best user-friendly
                                        features.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item__rights">
                            <div class="why__item">
                                <div class="icon">
                                    <img src="landing_asset/images/delivering-within-a-mintues.png" class="img-fluid"
                                            alt="">
                                </div>
                                <div class="text">
                                    <h4>Delivering Within a Minutes</h4>
                                    <p>
                                        Our delivery is automated, and it takes minutes if not seconds to fulfil
                                        orders.
                                    </p>
                                </div>
                            </div>
                            <div class="why__item">
                                <div class="icon">
                                    <img src="landing_asset/images/fastest-support.png" class="img-fluid" alt="">
                                </div>
                                <div class="text">
                                    <h4>Fastest Support 24/7</h4>
                                    <p>
                                        We are proud to have the most reliable or fastest support in the Honestsmm,
                                        replying to your tickets 24/7.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="whyChooseContent">
                        <p class="top-title">
                            Why Choose Honestsmm?
                        </p>
                        <h2>
                            SMM BD Is all in one <span class="text-gradient">social media marketing</span> tools
                            for Increase growth of your social media account.
                        </h2>
                        <p>
                            We provide the maximum <strong>lower-priced SMM Services</strong> amongst our
                            competitors. Our services
                            are the most cheapest however we do not compromise on the quality.
                        </p>
                        <p>
                            If you are looking for the most <strong>lower priced Social Media Marketing
                            Services</strong>, then
                            SMM BD is the precise desire for you.
                        </p>
                        <p>
                            Please take a look at our all <strong>cheapest and best SMM Services.</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #### Why Choose Section BY YUNUS whatsapp: +8801303260848 -->

    <!-- seo section Type 2  BY YUNUS whatsapp: +8801303260848 -->
    <section id="seoSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo_content_wraper item_1">
                        <div class="seo_content_type2">
                            <h3>
                                World Cheapest SMM Panel
                            </h3>
                            <p>
                                SMM BD redefines excellence in the realm of social media marketing, offering
                                unparalleled affordability without compromising on quality. Trusted by businesses of
                                all sizes, we're the go-to choice for effective and budget-friendly marketing
                                strategies.
                            </p>
                        </div>
                        <div class="seo_sec_btm">
                            <div class="icon">
                                <img src="landing_asset/images/world-cheapest-smm-panel.png" class="img-fluid"
                                        alt="world-cheapest-smm-panel">
                            </div>
                            <a href="#"><iconify-icon icon="ph:arrow-up-right"></iconify-icon></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo_content_wraper item_2">
                        <div class="seo_content_type2">
                            <h3>
                                Maximize speed with an all-in-one app
                            </h3>
                            <p>
                                Elevate your online presence swiftly and efficiently with India's leading SMM panel.
                                Experience the fusion of speed, affordability, and quality in one comprehensive app.
                                Trusted by businesses to accelerate their social media success.
                            </p>
                        </div>
                        <div class="seo_sec_btm">
                            <div class="icon">
                                <img src="landing_asset/images/maximize-speed-with-an-all-in-one-smm-panel.png"
                                        class="img-fluid" alt="maximize-speed-with-an-all-in-one-smm-panel">
                            </div>
                            <a href="#"><iconify-icon icon="ph:arrow-up-right"></iconify-icon></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="seo_content_wraper item_3">
                        <div class="seo_content_type2">
                            <h3>
                                Build workspaces for your team requires
                            </h3>
                            <p>
                                Discover the ultimate toolkit at HonestSMM, empowering you to create tailored
                                environments for your team's success. Grow your company account and get client trust
                                make more money.
                            </p>
                        </div>
                        <div class="seo_sec_btm">
                            <div class="icon">
                                <img src="landing_asset/images/build-workspaces-for-your-team-requires.png"
                                        class="img-fluid" alt="world-cheapest-smm-panel">
                            </div>
                            <a href="#"><iconify-icon icon="ph:arrow-up-right"></iconify-icon></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Seo Section Type 2  BY YUNUS whatsapp: +8801303260848 -->

    <!-- Our Services BY YUNUS whatsapp: +8801303260848 -->
    <section id="ourServices">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="def_title_wrap text-center">
                        <p class="top-title">
                            Our Services
                        </p>
                        <h2 class="def_title">

                            <span class="text-gradient">Best Smm Services Providers For all platforms</span>
                        </h2>
                        <p>
                            We are active for support for 24 hours a day and seven times a week with all of your
                            demands and services around the day. Don't go anywhere else. We are here ready to serve
                            you and help you with all of your SMM needs. Users or Clients with SMM orders and in
                            need of <strong>Cheap SMM services</strong> are more then welcome in our <strong>SMM
                            PANEL</strong>.
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills services_navigations" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-facebook-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-facebook" type="button" role="tab" aria-controls="pills-facebook"
                                        aria-selected="true">
                <span class="icon">
                <img src="landing_asset/images/facebook.png" class="img-fluid" alt="">
                </span>
                                    <span class="txt">Facebook</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-instagram-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-instagram" type="button" role="tab" aria-controls="pills-instagram"
                                        aria-selected="false">
                <span class="icon">
                <img src="landing_asset/images/instagram.png" class="img-fluid" alt="">
                </span>
                                    <span class="txt">Instagram</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-twitter-tab" data-bs-toggle="pill" data-bs-target="#pills-twitter"
                                        type="button" role="tab" aria-controls="pills-twitter" aria-selected="false">
                <span class="icon">
                <img src="landing_asset/images/twitter.png" class="img-fluid" alt="">
                </span>
                                    <span class="txt"> X-Twitter</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-youtube-tab" data-bs-toggle="pill" data-bs-target="#pills-youtube"
                                        type="button" role="tab" aria-controls="pills-youtube" aria-selected="false">
                <span class="icon">
                <img src="landing_asset/images/youtube.png" class="img-fluid" alt="">
                </span>
                                    <span class="txt">Youtube</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-tiktok-tab" data-bs-toggle="pill" data-bs-target="#pills-tiktok"
                                        type="button" role="tab" aria-controls="pills-tiktok" aria-selected="false">
                <span class="icon">
                <img src="landing_asset/images/tiktok.png" class="img-fluid" alt="">
                </span>
                                    <span class="txt">Tiktok</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-facebook" role="tabpanel"
                                aria-labelledby="pills-facebook-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_services">
                                        <h3 class="text-primary">
                                            Facebook SMM Panel
                                        </h3>
                                        <p>
                                            Unlock the full potential of your Facebook presence with our
                                            comprehensive suite of services. From boosting followers and likes to
                                            enhancing reactions, video views, and even aiding in monetization, we
                                            offer tailored solutions to amplify your impact on the world's largest
                                            social media platform. Elevate your Facebook profile, engage your
                                            audience, and achieve your social media goals effortlessly with our
                                            specialized services.
                                        </p>
                                        <ul>
                                            <li>✅ Facebook Smm Panel</li>
                                            <li>✅ Cheapest Facebook Follower Panel</li>
                                            <li>✅ Facebook Provider Panel</li>
                                            <li>✅ Cheap Facebook Services</li>
                                            <li>✅ Facebook Likes Provider</li>
                                            <li>✅ Facebook Live stream views</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_image">
                                        <img src="landing_asset/images/social_media_services.webp" class="img-fluid"
                                                alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-instagram" role="tabpanel" aria-labelledby="pills-instagram-tab"
                                tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_services">
                                        <h3 class="text-primary">
                                            Instagram SMM Panel
                                        </h3>
                                        <p>
                                            Empower your Instagram journey with our dedicated suite of services. Our
                                            <strong>Instagram SMM panel</strong> offers a holistic approach,
                                            delivering followers,
                                            likes, comments, story views, and more to bolster your profile's
                                            visibility and engagement. From turbocharging your follower count to
                                            enhancing post interactions and story views, we're your one-stop
                                            solution for amplifying your presence on this dynamic platform. Elevate
                                            your Instagram game and achieve your social media aspirations seamlessly
                                            with our specialized services.
                                        </p>
                                        <ul>
                                            <li>
                                                ✅ Best Instagram Smm Panel
                                            </li>
                                            <li>
                                                ✅ Lowest price instagram Follower Panel
                                            </li>
                                            <li>
                                                ✅ Instagram Comments cheapest services
                                            </li>
                                            <li>
                                                ✅ Instagram fast follower services
                                            </li>
                                            <li>
                                                ✅ Cheap instagram services
                                            </li>
                                            <li>
                                                ✅ Instagram Services Provider
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_image">
                                        <img src="landing_asset/images/social_media_services.webp" class="img-fluid"
                                                alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-twitter" role="tabpanel" aria-labelledby="pills-twitter-tab"
                                tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_services">
                                        <h3 class="text-primary">
                                            X-Twitter SMM Panel
                                        </h3>
                                        <p>
                                            Introducing X-Twitter SMM Panel, your gateway to Twitter success. Dive
                                            into a world of enhanced engagement and visibility with our tailored
                                            suite of services. From amplifying followers and retweets to boosting
                                            likes and maximizing your tweet reach, we offer specialized solutions to
                                            supercharge your presence on this influential platform. Elevate your
                                            Twitter game and unlock the full potential of your content effortlessly
                                            with our comprehensive services, designed to drive impact and
                                            recognition in the Twittersphere.
                                        </p>
                                        <ul>
                                            <li>
                                                ✅ Best Twitter Smm Panel
                                            </li>
                                            <li>
                                                ✅ Lowest price Twitter Follower Panel
                                            </li>
                                            <li>
                                                ✅ Twitter Comments cheapest services
                                            </li>
                                            <li>
                                                ✅ Twitter fast follower services
                                            </li>
                                            <li>
                                                ✅ Cheap Twitter services
                                            </li>
                                            <li>
                                                ✅ Twitter Services Provider
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_image">
                                        <img src="landing_asset/images/social_media_services.webp" class="img-fluid"
                                                alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-youtube" role="tabpanel" aria-labelledby="pills-youtube-tab"
                                tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_services">
                                        <h3 class="text-primary">
                                            YouTube SMM Panel
                                        </h3>
                                        <p>
                                            Introducing the <strong>YouTube SMM Panel</strong>, your gateway to
                                            YouTube prominence.
                                            Explore a suite of specialized services tailored to elevate your
                                            channel's impact. From increasing subscribers and likes to maximizing
                                            video views and boosting comments, we offer comprehensive solutions to
                                            amplify your presence on this influential platform. Unlock the full
                                            potential of your YouTube content effortlessly with our services,
                                            designed to drive engagement and recognition in the digital realm.
                                        </p>
                                        <ul>
                                            <li>✅ Boost Youtube Channel</li>
                                            <li>✅ Youtube subscriber smmpanel</li>
                                            <li>✅ Youtube Monitization smmpanel</li>
                                            <li>✅ Youtube Like smmpanel</li>
                                            <li>✅ Youtube smm services</li>
                                            <li>✅ Youtube real services</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_image">
                                        <img src="landing_asset/images/social_media_services.webp" class="img-fluid"
                                                alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-tiktok" role="tabpanel" aria-labelledby="pills-tiktok-tab"
                                tabindex="0">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_services">
                                        <h3 class="text-primary">
                                            TikTok SMM Panel
                                        </h3>
                                        <p>
                                            Introducing the <strong>TikTok SMM Panel</strong>, your ticket to TikTok
                                            stardom. Unleash
                                            the power of tailored services designed to elevate your profile's
                                            visibility. From skyrocketing followers and likes to maximizing video
                                            views and boosting comments, our comprehensive solutions are geared to
                                            amplify your presence on this vibrant platform. Seamlessly enhance your
                                            TikTok content and increase engagement with our specialized services,
                                            crafted to propel your success in the TikTok universe.
                                        </p>
                                        <ul>
                                            <li>
                                                ✅ Best Tiktok Smm Panel
                                            </li>
                                            <li>
                                                ✅ Lowest price Tiktok Follower Panel
                                            </li>
                                            <li>
                                                ✅ Tiktok cheapest services
                                            </li>
                                            <li>
                                                ✅ Tiktok Real fast follower services
                                            </li>
                                            <li>
                                                ✅ Cheap tiktok services
                                            </li>
                                            <li>
                                                ✅ Tiktok Services Provider
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="social_media_image">
                                        <img src="landing_asset/images/social_media_services.webp" class="img-fluid"
                                                alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ### Our Services BY YUNUS whatsapp: +8801303260848 -->

    <!-- SEO Sections  BY YUNUS whatsapp: +8801303260848 -->
    <section id="SEO">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/smmfollowers.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                Best Indian SMM Panel
                            </h3>
                            <p>
                                You will get the <strong>Cheapest Indian SMM Panel</strong> services with the most
                                attractive offers. Now you can grow your Brand On social media with the Cheapest SMM
                                panel. SMM BD is a Worlds Provider Of top 10 SMM panel in India 2024.Honestsmm,
                                <strong>The World's #1 Best SMM Reseller panel-The Cheapest SMM Reseller
                                    Panel</strong> and API function for our SMM resellers.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/cheapest-smm-panel-india.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                SMM panel Pakistan
                            </h3>
                            <p>
                                SMM BD is a Worlds Provider Of SMM panel Pakistan 2024. We provide SMM Panel
                                services for Pakistani SMM Freelancers. SMM BD is The best and Cheap SMM panel in
                                Pakistan. social media marketing in Pakistan is Straightforward because we accept
                                Pakistani Payment gateway cashmaal.com SMM BD is a Worlds Provider Of the best
                                SMM services in 2024.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/smm-reseller-panel-services.png" class="img-fluid"
                                    alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                SMM Reseller Panel
                            </h3>
                            <p>
                                SMM BD is The Best SMM Reseller Panel from 2011. SMM BD Provides cheap SMM
                                Reseller Panel Services for Panel Owners, Store Owners, and Freelancers of the
                                various marketplace in The world. SMM BD is a Worlds Provider Of wholesale SMM
                                panel 2024.
                                SMM BD is a Worlds Provider Of the best SMM 2024. Best and Cheapest SMM Panel for
                                you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #### SEO Sections  BY YUNUS whatsapp: +8801303260848 -->


    <!-- FAq  BY YUNUS whatsapp: +8801303260848 -->
    <section id="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="def_title_wrap text-center">
                        <p class="top-title">
                            FAQ's
                        </p>
                        <h2 class="def_title">
                            <span class="text-gradient">Frequetly Asked Questions</span>
                        </h2>
                        <p>
                            We have writen below few question and answare, sometimes our customer ask to us few
                            common question please read carefully and understand what we means.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq_question_wraper">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        What is an SMM panel?
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>
                                            SMM Panel is a social media marketing Website . which is provide you
                                            instagram followers, likes and other social media services in just few
                                            dollars. smm panel make your profiles high quality with enogh likes and
                                            followers.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        What is an SMM Service?
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>
                                            SMM Service is called social Media Marketing Services, in Smm websites
                                            you can see Lot of Social Media Services For example instagram followers
                                            likes and many more, in very low price. and quality of followers and
                                            likes is too Best. which is help in your business and profiles quality.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Why Choose Honestsmm?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>
                                            In SMM BD You will get 24/7 Support. and all services in low price.
                                            with quality.SMM BD is updating services daily For clients
                                            satisfaction. so you will get always positive results from us.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        which is the fastest growing smm panel ?
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>SMM BD is trust of 17644 clients, and complete 1.5 Million orders in
                                            2024, SMM BD services too fastest in whole smm community.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                        Which is best smm panel for instagram ?
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        SMM BD is best instagram smm panel Because in SMM BD instagram
                                        services Just start from 0.001$/K, And all services is high quality. So you
                                        can use services without worry.
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                        What kinds of SMM services can I find here?
                                    </button>
                                </h2>
                                <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>
                                            You can buy different types of SMM services: Get Social media account
                                            followers, likes, views, etc. Also you can get Youtube channel
                                            Monitization services form us.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                                        Is it safe to use your SMM services?
                                    </button>
                                </h2>
                                <div id="flush-collapseSeven" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>
                                            Yes, it's completely safe, you won't lose your social media accounts.
                                            Sign up and check our services and prices also check our safe and
                                            secures payment gateways, If you have any more question just create an
                                            tickets or contact our support team, we will help you our best.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
                                        Which social media best for promoting business?
                                    </button>
                                </h2>
                                <div id="flush-collapseEight" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>
                                            We recommend use all Social Media Platforms, more platforms more reach
                                            and the greater the recognition.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
                                        Why you need grow your social media?
                                    </button>
                                </h2>
                                <div id="flush-collapseNine" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>
                                            To make your business stand out from others in the modern competitive
                                            market is very difficult. It doesn't matter how good your product.
                                            Ineffective marketing does not generate revenue at all.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
                                        Is SMM BD wholesale SMM Panel?
                                    </button>
                                </h2>
                                <div id="flush-collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>
                                            We have lot's of API user , We are providing cheapest smm services and
                                            super fast support,Our most of the services working instantly, So you
                                            can compare our price with other website and then you can try to connect
                                            our api with your panel.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### FAq  BY YUNUS whatsapp: +8801303260848 -->


    <!-- SEO Sections  BY YUNUS whatsapp: +8801303260848 -->
    <section id="SEO">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/top-smm-panel.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                Top SMM Panel
                            </h3>
                            <p>
                                SMM BD is a Worlds Provider Of top SMM panel 2024. SMM BD is One of The top
                                SMM panel In The world. From the top 10 SMM panels, SMM BD is The Best and
                                Cheapest in The Market. SMM BD provides 100% Real and Instant Services. They
                                Recommended Services that Have a Double fire Icon.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/smmpanel-provider-panel.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                SMM Provider Panel
                            </h3>
                            <p>
                                For those who are beginners in the industry and do not want to spend much on
                                marketing, we also have cheap SMM panels which can easily fulfill their marketing
                                requirement. We have the most reasonable prices in the market and thus we are known
                                as one of the best SMM service providers. We serve our clients with the world
                                largest and cheapest reseller panel.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/cheapestsmmpanel.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                Cheapest SMM Panel
                            </h3>
                            <p>
                                You will find all kind of SMM panels on our site including the Cheapest Indian SMM
                                Panel and that too at very affordable prices. Our Cheapest SMM Panel For Reseller
                                are extremely user friendly and are the best for the Indian SMM. If you need the SMM
                                Panel, we are here to assist you 24*7 and hence we are the most reliable SMM
                                provider in the country around you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #### SEO Sections  BY YUNUS whatsapp: +8801303260848 -->

    <!-- Testimonials Section  BY YUNUS whatsapp: +8801303260848 -->
    <section id="testimonials_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="def_title_wrap text-center">
                        <p class="top-title">
                            Testimonial
                        </p>
                        <h2 class="def_title">
                            <span class="text-gradient">Our satisfied clients testimonials</span>
                        </h2>
                        <p>
                            15628+ Users Using the Honestsmm. See what they say about us
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="testimonials_image">
                        <img src="landing_asset/images/testimonials_right.webp" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <div class="testimonials_content_wrap">
                                    <p>
                                        SMM BD has been instrumental in boosting my artist Facebook pages. Their
                                        dedication to service excellence, combined with pocket-friendly prices and
                                        round-the-clock customer support, has significantly facilitated the growth
                                        of my brand. In my experience, SMM BD stands out as the paramount SMM
                                        company I've ever utilized. Their commitment to quality service and
                                        unwavering support have made navigating the social media landscape a
                                        seamless experience for me, helping me build a thriving brand presence
                                        effortlessly.
                                    </p>
                                    <div class="testimonials_client">
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h5>Steven W.</h5>
                                        <p class="text-muted">- Influencer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonials_content_wrap">
                                    <p>
                                        When it comes to making my Instagram posts go viral, I rely on HonestSMM's
                                        power likes, followers, and views—and they never disappoint. Their
                                        consistent delivery of quality services has been remarkable. Additionally,
                                        whenever I've had queries regarding an order, their responsiveness and quick
                                        solutions have truly impressed me. SMM BD is my go-to for ensuring my
                                        content gets the attention it deserves, coupled with unparalleled customer
                                        service for a seamless experience.
                                    </p>
                                    <div class="testimonials_client">
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h5>Jorge M.</h5>
                                        <p class="text-muted">- CEO, EGC Group</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonials_content_wrap">
                                    <p>
                                        After years of exploring various SMM panels, I can confidently say that none
                                        match the trust and reliability I've found in HonestSMM. When it comes to my
                                        business and social media needs, they've become my unparalleled choice.
                                        Their consistency, integrity, and commitment to excellence set them apart in
                                        an industry where trust is paramount. SMM BD stands as the cornerstone of
                                        my online presence and business growth strategy.
                                    </p>
                                    <div class="testimonials_client">
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h5>Ray L.</h5>
                                        <p class="text-muted">- Youtuber</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonials_content_wrap">
                                    <p>
                                        After years of exploring numerous SMM panels, I've traversed the landscape
                                        of options. Yet, in this journey, no platform instills in me the level of
                                        trust and confidence for my business and social media needs quite like
                                        HonestSMM. Their reliability, consistency, and dedication to excellence make
                                        them my unequivocal choice. SMM BD stands tall as the cornerstone of my
                                        online presence and the catalyst for my business growth strategy.
                                    </p>
                                    <div class="testimonials_client">
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h5>Adam A.</h5>
                                        <p class="text-muted">- Social Media Manager</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonials_content_wrap">
                                    <p>
                                        Thanks to HonestSMM, I've amassed millions of followers on social media.
                                        This growth has propelled me into the realm of an influencer, allowing me to
                                        establish a sustainable online income. It's empowered me to live life on my
                                        terms, enabling me to travel and pursue the passions I've always dreamt of,
                                        all made possible by the unparalleled support and services offered by
                                        HonestSMM.
                                    </p>
                                    <div class="testimonials_client">
                                        <div class="star">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h5>Ray L.</h5>
                                        <p class="text-muted">- Actor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper_btn">
                            <button id="prev_swiper">
                                <img src="landing_asset/images/arrow-btn.png" class="img-fluid" alt="">
                            </button>
                            <button id="next_swiper">
                                <img src="landing_asset/images/arrow-btn.png" class="img-fluid" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #### Testimonials Section  BY YUNUS whatsapp: +8801303260848 -->

    <img src="landing_asset/images/after-testimonials.svg" class="img-fluid image-wave" alt=""
            style="width: 100%;">

    <!-- SEO Sections  BY YUNUS whatsapp: +8801303260848 -->
    <section id="SEO" class="bg-dark seo_sec_has_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/bestsmmpanel-for-facebook.png" class="img-fluid"
                                    alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                Best Facebook SMM Panel
                            </h3>
                            <p>
                                SMM BD is a Worlds Provider Of the cheapest panel 2024. SMM BD is a Best SMM
                                Provider of Facebook Likes, Followers, Views, and Live Streaming Viewers. We are
                                Reseller of Facebook SMM Services. But Our Services very Cheap. Try Now Our Facebook
                                Services.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/free-smmpanel.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                Free SMM Panel
                            </h3>
                            <p>
                                SMM BD is a Worlds Provider Of free SMM panel 2024. SMM BD offers Free SMM
                                Panel Services. Daily 50 telegram likes Trial fast, 1000 Tiktok and telegram Views
                                trial, 100 telegram followers trial, 10 Tiktok followers trial, 50 free TikTok likes
                                trial Instantly without password. We also Provide Cheap and Real Premium SMM Panel
                                Services.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="seo__item__wrap">
                        <div class="icons">
                            <img src="landing_asset/images/smmpanel-instagram.png" class="img-fluid" alt="">
                        </div>
                        <div class="seo__content">
                            <h3 class="text-gradient">
                                SMM Panel Instagram
                            </h3>
                            <p>
                                SMM BD is a Worlds Provider Of the cheapest SMM panels in 2024. SMM BD is the
                                Main SMM panel Instagram provider of Maximum SMM services to handle any issue
                                Instantly. Instagram Is Our Top Selling Services. We have Huge Own IG SMM Panel
                                services such as Followers, likes, Reel, Views, TV, Story Views, and Many More.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #### SEO Sections  BY YUNUS whatsapp: +8801303260848 -->


    <!-- Payment Gateways  BY YUNUS whatsapp: +8801303260848 -->
    <section id="ourPayment">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="def_title_wrap text-center">
                        <p class="top-title">
                            Our Payment Method
                        </p>
                        <h2 class="def_title">
                            <span class="text-gradient">Payment Methods We Accept</span>
                        </h2>
                        <p>
                            We accept most of the payment methods those are reliable for safe money transfer. <br>
                            In the below section, you can see some of our payments methods.
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="payment_gateway_image">
                        <img src="landing_asset/images/payment-gateways.webp" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #### Payment Gateways BY YUNUS whatsapp: +8801303260848 -->

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