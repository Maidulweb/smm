<?php

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear', function () {
    $output = new \Symfony\Component\Console\Output\BufferedOutput();
    Artisan::call('optimize:clear', array(), $output);
    return $output->fetch();
})->name('/clear');


Route::get('queue-work', function () {
    return Illuminate\Support\Facades\Artisan::call('queue:work', ['--stop-when-empty' => true]);
})->name('queue.work');

Route::get('schedule-run', function () {
    return Illuminate\Support\Facades\Artisan::call('schedule:run');
})->name('cron');

Route::get('migrate', function () {
    return Illuminate\Support\Facades\Artisan::call('migrate');
});
Route::get('gateway-update', function () {
    return Illuminate\Support\Facades\Artisan::call('gateway:update');
});



Route::get('/themeMode/{themeType?}', function ($themeType = 'true') {
    session()->put('dark-mode', $themeType);
    return $themeType;
})->name('themeMode');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('login');
    Route::post('/', 'Admin\LoginController@login')->name('login');
    Route::post('/logout', 'Admin\LoginController@logout')->name('logout');


    Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.update');


    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('dashboard');

        Route::get('push-notification-show', 'SiteNotificationController@showByAdmin')->name('push.notification.show');
        Route::get('push.notification.readAll', 'SiteNotificationController@readAllByAdmin')->name('push.notification.readAll');
        Route::get('push-notification-readAt/{id}', 'SiteNotificationController@readAt')->name('push.notification.readAt');
        Route::match(['get', 'post'], 'pusher-config', 'SiteNotificationController@pusherConfig')->name('pusher.config');


        Route::get('/referral-commission', 'Admin\DashboardController@referralCommission')->name('referral-commission');
        Route::post('/referral-commission', 'Admin\DashboardController@referralCommissionStore')->name('referral-commission.store');
        Route::post('/referral-commission/action', 'Admin\DashboardController@referralCommissionAction')->name('referral-commission.action');


        Route::get('/profile', 'Admin\DashboardController@profile')->name('profile');
        Route::put('/profile', 'Admin\DashboardController@profileUpdate')->name('profileUpdate');
        Route::get('/password', 'Admin\DashboardController@password')->name('password');
        Route::put('/password', 'Admin\DashboardController@passwordUpdate')->name('passwordUpdate');


        Route::get('payment-methods', 'Admin\PaymentMethodController@index')->name('payment.methods');
        Route::post('payment-methods/deactivate', 'Admin\PaymentMethodController@deactivate')->name('payment.methods.deactivate');
        Route::get('payment-methods/deactivate', 'Admin\PaymentMethodController@deactivate')->name('payment.methods.deactivate');
        Route::post('sort-payment-methods', 'Admin\PaymentMethodController@sortPaymentMethods')->name('sort.payment.methods');
        Route::get('payment-methods/edit/{id}', 'Admin\PaymentMethodController@edit')->name('edit.payment.methods');
        Route::put('payment-methods/update/{id}', 'Admin\PaymentMethodController@update')->name('update.payment.methods');


        // Manual Methods
        Route::get('payment-methods/manual', 'Admin\ManualGatewayController@index')->name('deposit.manual.index');
        Route::get('payment-methods/manual/new', 'Admin\ManualGatewayController@create')->name('deposit.manual.create');
        Route::post('payment-methods/manual/new', 'Admin\ManualGatewayController@store')->name('deposit.manual.store');
        Route::get('payment-methods/manual/edit/{id}', 'Admin\ManualGatewayController@edit')->name('deposit.manual.edit');
        Route::put('payment-methods/manual/update/{id}', 'Admin\ManualGatewayController@update')->name('deposit.manual.update');


        Route::get('payment/pending', 'Admin\PaymentLogController@pending')->name('payment.pending');
        Route::put('payment/action/{id}', 'Admin\PaymentLogController@action')->name('payment.action');
        Route::get('payment/log', 'Admin\PaymentLogController@index')->name('payment.log');
        Route::get('payment/search', 'Admin\PaymentLogController@search')->name('payment.search');


        Route::get('/users', 'Admin\UsersController@index')->name('users');
        Route::get('/users/search', 'Admin\UsersController@search')->name('users.search');
        Route::post('/users-active', 'Admin\UsersController@activeMultiple')->name('user-multiple-active');
        Route::post('/users-inactive', 'Admin\UsersController@inactiveMultiple')->name('user-multiple-inactive');
        Route::get('/email-send', 'Admin\UsersController@sendMailUsers')->name('users.email-send');
        Route::post('/email-send', 'Admin\UsersController@sendMailUsersStore')->name('users.email-send.store');
        Route::get('/user/edit/{id}', 'Admin\UsersController@userEdit')->name('user-edit');
        Route::post('/user/update/{id}', 'Admin\UsersController@userUpdate')->name('user-update');
        Route::post('/user/password/{id}', 'Admin\UsersController@passwordUpdate')->name('userPasswordUpdate');
        Route::post('/user/balance-update/{id}', 'Admin\UsersController@userBalanceUpdate')->name('user-balance-update');
        Route::get('/user/send-email/{id}', 'Admin\UsersController@sendEmail')->name('send-email');
        Route::post('/user/send-email/{id}', 'Admin\UsersController@sendMailUser')->name('user.email-send');
        Route::post('/user/loginAccount/{id}', 'Admin\UsersController@loginAccount')->name('user-loginAccount');


        Route::get('/user/custom-rate/{id}', 'Admin\UsersController@customRate')->name('user.customRate');
        Route::get('/user/getService', 'Admin\UsersController@getService')->name('user.getService');
        Route::post('/user/setServiceRate', 'Admin\UsersController@setServiceRate')->name('user.setServiceRate');

        Route::get('/user/updateServiceRate', 'Admin\UsersController@updateServiceRate')->name('user.updateServiceRate');
        Route::get('/user/deleteServiceRate', 'Admin\UsersController@deleteServiceRate')->name('user.deleteServiceRate');

        Route::post('/user/keyGenerate/{id}', 'Admin\UsersController@keyGenerate')->name('user.keyGenerate');

        Route::get('/user/transaction/{id}', 'Admin\UsersController@transaction')->name('user.transaction');
        Route::get('/user/fundLog/{id}', 'Admin\UsersController@funds')->name('user.fundLog');

        Route::get('/get-user-name', 'Admin\OrderManageController@getUsername')->name('get.user-name');
        Route::get('/user/order/{id}', 'Admin\OrderManageController@userOrder')->name('user-order');
        Route::get('/user/order-search', 'Admin\OrderManageController@userOrderSearch')->name('user-order-search');
        Route::get('/user-order-service/{id}', 'Admin\OrderManageController@userServiceEdit')->name('user-service-edit');

        //user order
        Route::get('/usersOrderChangeStatus', 'Admin\OrderManageController@usersOrderChangeStatus')->name('usersOrderChangeStatus');
        Route::get('/users-order/awaiting', 'Admin\OrderManageController@awaitingMultiple')->name('user-order-multiple-awaiting');
        Route::get('/users-order/awaiting', 'Admin\OrderManageController@awaitingMultiple')->name('user-order-multiple-awaiting');
        Route::get('/users-order/pending', 'Admin\OrderManageController@pendingMultiple')->name('user-order-multiple-pending');
        Route::get('/users-order/processing', 'Admin\OrderManageController@processingMultiple')->name('user-order-multiple-processing');
        Route::get('/users-order/inprogress', 'Admin\OrderManageController@inProgressMultiple')->name('user-order-multiple-inprogress');
        Route::get('/users-order/completed', 'Admin\OrderManageController@completedMultiple')->name('user-order-multiple-completed');
        Route::get('/users-order/partial', 'Admin\OrderManageController@partialMultiple')->name('user-order-multiple-partial');
        Route::get('/users-order/canceled', 'Admin\OrderManageController@cancelledMultiple')->name('user-order-multiple-canceled');
        Route::get('/users-order/refunded', 'Admin\OrderManageController@refundedMultiple')->name('user-order-multiple-refunded');

        Route::get('/service', 'ServiceController@create')->name('service.add');
        Route::get('/services', 'ServiceController@index')->name('service.show');
        Route::post('/services', 'ServiceController@store')->name('service.store');
        Route::get('/search-service', 'ServiceController@search')->name('service-search');
        Route::post('/search-service/status/{id?}', 'ServiceController@statusChange')->name('service.status.change');

        Route::get('/service-active', 'ServiceController@serviceActive')->name('service-active');
        Route::get('/service-deActive', 'ServiceController@serviceDeActive')->name('service-deactive');
        Route::get('/service/{id}', 'ServiceController@edit')->name('service.edit');
        Route::post('/service/update', 'ServiceController@update')->name('service.update');
        Route::get('/get-service', 'ServiceController@getService')->name('get.service');
        Route::get('/service-multiple-active', 'ServiceController@activeMultiple')->name('service-multiple-active');
        Route::get('/service-multiple-deActive', 'ServiceController@deactiveMultiple')->name('service-multiple-deactive');
        Route::get('/service-multiple-delete', 'ServiceController@deleteMultiple')->name('service-multiple-delete');
        Route::get('/service-multiple-price-update', 'ServiceController@priceUpdateMultiple')->name('service-multiple-price-update');

        Route::get('/category/add', 'CategoryController@create')->name('category.add');
        Route::post('/category', 'CategoryController@store')->name('category.store');

        Route::get('/category-active', 'CategoryController@categoryActive')->name('category-active');
        Route::get('/category-deactive', 'CategoryController@categoryDeactive')->name('category-deactive');
        Route::get('/category/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('/category/update', 'CategoryController@update')->name('category.update');
        Route::get('/categories', 'CategoryController@index')->name('category.show');
        Route::post('/category/status/{id?}', 'CategoryController@statusChange')->name('category.status.change');
        Route::get('/get-category', 'CategoryController@show')->name('get.category');
        // search
        Route::get('/search-category', 'CategoryController@search')->name('category-search');
        Route::get('/category-multiple-active', 'CategoryController@activeMultiple')->name('category-multiple-active');
        Route::get('/category-multiple-deactive', 'CategoryController@deactiveMultiple')->name('category-multiple-deactive');

        Route::resource('api-provider', 'ApiProviderController', ['as' => 'provider']);
        // search
        Route::get('/search-provider', 'ApiProviderController@search')->name('provider-search');

        Route::post('api-provider/status{id}', 'ApiProviderController@changeStatus')->name('provider.status');
        Route::put('api-provider/setCurrency/{id}', 'ApiProviderController@setCurrency')->name('provider.setCurrency');
        Route::post('api-provider/priceUpdate/{id}', 'ApiProviderController@priceUpdate')->name('provider.priceUpdate');
        Route::post('api-provider/balanceUpdate/{id}', 'ApiProviderController@balanceUpdate')->name('provider.balanceUpdate');

        Route::post('/api-services', 'ApiProviderController@getApiServices')->name('api.services');
        Route::post('/api-services/import', 'ApiProviderController@import')->name('api.service.import');
        Route::post('/api-services/import/multi', 'ApiProviderController@importMulti')->name('api.service.import.multi');
        // jquery autocomplete search
        Route::get('/get-provider', 'ApiProviderController@providerShow')->name('get.provider');
        //api provider multiple
        Route::get('/apiprovider-multiple-active', 'ApiProviderController@activeMultiple')->name('apiprovider-multiple-active');
        Route::get('/apiprovider-multiple-deactive', 'ApiProviderController@deActiveMultiple')->name('apiprovider-multiple-deactive');

        /* ===== ADMIN Mange Theme ===== */
        Route::get('/manage/theme', 'ControlController@manageTheme')->name('manage.theme');
        Route::put('/activate/theme/{name}', 'ControlController@activateTheme')->name('activate.themeUpdate');

        /* ======== Plugin =======*/
        Route::get('/plugin-config', 'ControlController@pluginConfig')->name('plugin.config');
        Route::match(['get', 'post'], 'tawk-config', 'ControlController@tawkConfig')->name('tawk.control');
        Route::match(['get', 'post'], 'fb-messenger-config', 'ControlController@fbMessengerConfig')->name('fb.messenger.control');
        Route::match(['get', 'post'], 'google-recaptcha', 'ControlController@googleRecaptchaConfig')->name('google.recaptcha.control');
        Route::match(['get', 'post'], 'google-analytics', 'ControlController@googleAnalyticsConfig')->name('google.analytics.control');
        Route::match(['get', 'post'], 'currency-exchange-api-config', 'ControlController@currencyExchangeApiConfig')->name('currency.exchange.api.config');

        Route::get('/logo-seo', 'ControlController@logoSeo')->name('logo-seo');
        Route::put('/logoUpdate', 'ControlController@logoUpdate')->name('logoUpdate');
        Route::put('/seoUpdate', 'ControlController@seoUpdate')->name('seoUpdate');

        Route::get('/breadcrumb', 'ControlController@breadcrumb')->name('breadcrumb');
        Route::put('/breadcrumb', 'ControlController@breadcrumbUpdate')->name('breadcrumbUpdate');

        Route::any('/basic-controls', 'ControlController@index')->name('basic-controls');
        Route::post('/basic-controls', 'ControlController@updateConfigure')->name('basic-controls.update');

        Route::get('/color-settings', 'ControlController@colorSettings')->name('color-settings');
        Route::post('/color-settings', 'ControlController@colorSettingsUpdate')->name('color-settings.update');

        Route::get('/email-controls', 'EmailTemplateController@emailControl')->name('email-controls');
        Route::post('/email-controls', 'EmailTemplateController@emailConfigure')->name('email-controls.update');
        Route::post('/email-controls/action', 'EmailTemplateController@emailControlAction')->name('email-controls.action');
        Route::post('/email/test', 'EmailTemplateController@testEmail')->name('testEmail');

        Route::get('/email-template', 'EmailTemplateController@show')->name('email-template.show');
        Route::get('/email-template/edit/{id}', 'EmailTemplateController@edit')->name('email-template.edit');
        Route::post('/email-template/update/{id}', 'EmailTemplateController@update')->name('email-template.update');

        //sms control
        Route::match(['get', 'post'], '/sms-controls', 'SmsControlController@smsConfig')->name('sms.config');
        Route::post('/sms-controls/action', 'SmsControlController@smsControlAction')->name('sms-controls.action');

        Route::get('/sms/control-delete/{id}', 'SmsControlController@destroy')->name('smsControl_delete');
        Route::get('/sms-template', 'SmsTemplateController@show')->name('sms-template');
        Route::get('/sms-template/edit/{id}', 'SmsTemplateController@edit')->name('sms-template.edit');
        Route::post('/sms-template/update/{id}', 'SmsTemplateController@update')->name('sms-template.update');

        Route::get('/notify-config', 'Admin\NotifyController@notifyConfig')->name('notify-config');
        Route::post('/notify-config', 'Admin\NotifyController@notifyConfigUpdate')->name('notify-config.update');

        Route::get('/notify-template', 'Admin\NotifyController@show')->name('notify-template.show');
        Route::get('/notify-template/edit/{id}', 'Admin\NotifyController@edit')->name('notify-template.edit');
        Route::post('/notify-template/update/{id}', 'Admin\NotifyController@update')->name('notify-template.update');

        Route::get('/order', 'OrderController@index')->name('order');
        Route::post('/order/status', 'OrderController@statusChange')->name('order.status.change');
        Route::post('/order/refill-status', 'Admin\OrderManageController@refillStatusChange')->name('order.refill-status.change');
        Route::get('/order/edit/{id}', 'OrderController@edit')->name('order.edit');
        Route::post('/order/update/{id}', 'OrderController@update')->name('order.update');
        Route::delete('/order/destroy/{id}', 'OrderController@destroy')->name('order.destroy');
        Route::get('/get-service', 'OrderController@getservice')->name('get.service');
        Route::get('/get-user', 'OrderController@getuser')->name('get.user');
        Route::get('/search-order', 'OrderController@search')->name('order-search');

        Route::get('/order/awaiting', 'OrderController@awaiting')->name('awaiting');
        Route::get('/order/pending', 'OrderController@pending')->name('pending');
        Route::get('/order/processing', 'OrderController@processing')->name('processing');
        Route::get('/order/progress', 'OrderController@progress')->name('progress');
        Route::get('/order/completed', 'OrderController@completed')->name('completed');
        Route::get('/order/partial', 'OrderController@partial')->name('partial');
        Route::get('/order/canceled', 'OrderController@canceled')->name('canceled');
        Route::get('/order/refunded', 'OrderController@refunded')->name('refunded');
        // transaction
        Route::get('/transaction', 'OrderController@transaction')->name('user-transaction');
        Route::get('/transaction-search', 'OrderController@transactionSearch')->name('transaction.search');
        // jquery autocomplete search
        Route::get('/get-trx-id-search', 'OrderController@gettrxidsearch')->name('get.trx-id-search');
        Route::get('/get-trx-user-search', 'OrderController@getTrxUserSearch')->name('get.trx-user-search');
        // search

        /* ===== Support Ticket ===== */
        Route::get('tickets/{status?}', 'Admin\TicketController@tickets')->name('ticket');
        Route::get('tickets/search', 'Admin\TicketController@ticketSearch')->name('ticket.search');
        Route::get('tickets/view/{id}', 'Admin\TicketController@ticketReply')->name('ticket.view');
        Route::put('ticket/reply/{id}', 'Admin\TicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'Admin\TicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'Admin\TicketController@ticketDelete')->name('ticket.delete');

        Route::post('/service', function (Request $request) {
            $parent_id = $request->cat_id;
            $services = Service::where('category_id', $parent_id)->where('service_status', 1)->get();
            return response()->json($services);
        })->name('service');

        Route::get('notice', 'Admin\NoticeController@index')->name('notice');
        Route::get('notice/create', 'Admin\NoticeController@create')->name('notice.create');
        Route::post('notice/create', 'Admin\NoticeController@store')->name('notice.store');
        Route::get('notice/edit/{id}', 'Admin\NoticeController@edit')->name('notice.edit');
        Route::put('notice/edit/{id}', 'Admin\NoticeController@update')->name('notice.update');
        Route::delete('notice/delete/{id}', 'Admin\NoticeController@delete')->name('notice.delete');

        /* ===== ADMIN Subscriber SETTINGS ===== */
        Route::get('subscriber', 'Admin\SubscriberController@index')->name('subscriber.index');
        Route::post('subscriber/remove', 'Admin\SubscriberController@remove')->name('subscriber.remove');
        Route::get('subscriber/send-email', 'Admin\SubscriberController@sendEmailForm')->name('subscriber.sendEmail');
        Route::post('subscriber/send-email', 'Admin\SubscriberController@sendEmail')->name('subscriber.mail');

        /* ===== ADMIN Language SETTINGS ===== */
        Route::get('language', 'Admin\LanguageController@index')->name('language.index');
        Route::get('language/create', 'Admin\LanguageController@create')->name('language.create');
        Route::post('language/create', 'Admin\LanguageController@store')->name('language.store');

        Route::get('language/{language}', 'Admin\LanguageController@edit')->name('language.edit');
        Route::put('language/{language}', 'Admin\LanguageController@update')->name('language.update');
        Route::delete('language/{language}', 'Admin\LanguageController@delete')->name('language.delete');

        Route::get('/language/keyword/{id}', 'Admin\LanguageController@keywordEdit')->name('language.keywordEdit');
        Route::put('/language/keyword/{id}', 'Admin\LanguageController@keywordUpdate')->name('language.keywordUpdate');
        Route::post('/language/importJson', 'Admin\LanguageController@importJson')->name('language.importJson');

        Route::post('store-key/{id}', 'Admin\LanguageController@storeKey')->name('language.storeKey');
        Route::put('update-key/{id}', 'Admin\LanguageController@updateKey')->name('language.updateKey');
        Route::delete('delete-key/{id}', 'Admin\LanguageController@deleteKey')->name('language.deleteKey');

        /* ===== ADMIN TEMPLATE SETTINGS ===== */
        Route::get('template/{section}', 'Admin\TemplateController@show')->name('template.show');
        Route::put('template/{section}/{language}', 'Admin\TemplateController@update')->name('template.update');

        Route::get('contents/{content}', 'Admin\ContentController@index')->name('content.index');
        Route::get('content-create/{content}', 'Admin\ContentController@create')->name('content.create');
        Route::put('content-create/{content}/{language?}', 'Admin\ContentController@store')->name('content.store');
        Route::get('content-show/{content}', 'Admin\ContentController@show')->name('content.show');
        Route::put('content-update/{content}/{language?}', 'Admin\ContentController@update')->name('content.update');
        Route::delete('contents/{id}', 'Admin\ContentController@contentDelete')->name('content.delete');
    });
});

Route::middleware('Maintenance')->group(function () {
    Route::get('/user', 'Auth\LoginController@showLoginForm')->name('login');

    Auth::routes(['verify' => true]);

    Route::group(['middleware' => ['guest']], function () {
        Route::get('register/{sponsor?}', 'Auth\RegisterController@sponsor')->name('register.sponsor');
    });

    Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/check', 'VerificationController@check')->name('check');
        Route::get('/resend_code', 'VerificationController@resendCode')->name('resendCode');
        Route::post('/mail-verify', 'VerificationController@mailVerify')->name('mailVerify');
        Route::post('/sms-verify', 'VerificationController@smsVerify')->name('smsVerify');
        Route::post('/twoFA-Verify', 'VerificationController@twoFAverify')->name('twoFA-Verify');

        Route::middleware('userCheck')->group(function () {

            Route::get('/dashboard', 'HomeController@index')->name('home');

            Route::get('add-fund', 'HomeController@addFund')->name('addFund');
            Route::post('add-fund', 'PaymentController@addFundRequest')->name('addFund.request');
            Route::get('addFundConfirm', 'PaymentController@depositConfirm')->name('addFund.confirm');
            Route::post('addFundConfirm', 'PaymentController@fromSubmit')->name('addFund.fromSubmit');

            //transaction
            Route::get('/transaction', 'HomeController@transaction')->name('transaction');
            Route::get('/transaction-search', 'HomeController@transactionSearch')->name('transaction.search');
            Route::get('fund-history', 'HomeController@fundHistory')->name('fund-history');
            Route::get('fund-history-search', 'HomeController@fundHistorySearch')->name('fund-history.search');

            Route::get('/profile', 'HomeController@profile')->name('profile');
            Route::post('/updateProfile', 'HomeController@updateProfile')->name('updateProfile');
            Route::put('/updateInformation', 'HomeController@updateInformation')->name('updateInformation');
            Route::post('/updatePassword', 'HomeController@updatePassword')->name('updatePassword');

            Route::get('/apiKey', 'HomeController@apiKey')->name('apiKey');

            Route::get('/referral', 'HomeController@referral')->name('referral');
            Route::get('/referral-bonus', 'HomeController@referralBonus')->name('referral.bonus');
            Route::get('/referral-bonus-search', 'HomeController@referralBonusSearch')->name('referral.bonus.search');

            //order
            Route::resource('order', 'User\OrderController');
            Route::get('/orders', 'User\OrderController@search')->name('order.search');
            Route::get('/orders-refill', 'User\OrderController@refillView')->name('order-refill');
            Route::get('/orders-refill/search', 'User\OrderController@refillSearch')->name('order.refill.search');
            Route::get('/orders-refill/{status}', 'User\OrderController@refillStatusSearch')->name('order-refill.search');

            Route::get('/orders-dripfeed', 'User\OrderController@dripfeedView')->name('order-dripFeed');
            Route::get('/orders-dripfeed/search', 'User\OrderController@dripfeedSearch')->name('order.dripfeed.search');
            Route::get('/orders-dripfeed/{status}', 'User\OrderController@dripfeedStatusSearch')->name('order-dripFeed.search');

            Route::post('/order/status', 'User\OrderController@statusChange')->name('order.status.change');
            Route::get('/orders/{status}', 'User\OrderController@statusSearch')->name('order.status.search');
            Route::get('/mass/orders', 'User\OrderController@massOrder')->name('order.mass');
            Route::post('/mass/orders', 'User\OrderController@masOrderStore')->name('order.mass.store');
            Route::get('/get-service', 'ServiceController@getservice')->name('get.service');
            Route::put('/order/refill/{id}', 'User\OrderController@orderRefill')->name('order.refill');

            //order search
            Route::get('/services', 'User\ServiceController@index')->name('service.show');
            Route::get('/service-search', 'User\ServiceController@search')->name('service.search');


            Route::get('/api/docs', 'User\ApiController@index')->name('api.docs');
            Route::post('/keyGenerate', 'User\ApiController@apiGenerate')->name('keyGenerate');

            // TWO-FACTOR SECURITY
            Route::get('/twostep-security', 'HomeController@twoStepSecurity')->name('twostep.security');
            Route::post('twoStep-enable', 'HomeController@twoStepEnable')->name('twoStepEnable');
            Route::post('twoStep-disable', 'HomeController@twoStepDisable')->name('twoStepDisable');

            // Support Ticket
            Route::group(['prefix' => 'ticket', 'as' => 'ticket.'], function () {
                Route::get('/', 'User\SupportController@index')->name('list');
                Route::get('/create', 'User\SupportController@create')->name('create');
                Route::post('/create', 'User\SupportController@store')->name('store');
                Route::get('/view/{ticket}', 'User\SupportController@view')->name('view');
                Route::put('/reply/{ticket}', 'User\SupportController@reply')->name('reply');
                Route::get('/download/{ticket}', 'User\SupportController@download')->name('download');
                Route::get('/filter/{status}', 'User\SupportController@filter')->name('filter');
            });

            Route::post('/service', function (Request $request) {
                $parent_id = $request->cat_id;
                $services = Service::where('category_id', $parent_id)->where('service_status', 1)->get();
                return response()->json($services);
            })->name('service');


            Route::get('push-notification-show', 'SiteNotificationController@show')->name('push.notification.show');
            Route::get('push.notification.readAll', 'SiteNotificationController@readAll')->name('push.notification.readAll');
            Route::get('push-notification-readAt/{id}', 'SiteNotificationController@readAt')->name('push.notification.readAt');

            Route::get('/user-service', 'User\OrderController@userservice')->name('service_id');

        });
    });

    Route::match(['get', 'post'], 'success', 'PaymentController@success')->name('success');
    Route::match(['get', 'post'], 'failed', 'PaymentController@failed')->name('failed');
    Route::match(['get', 'post'], 'payment/{code}/{trx?}/{type?}', 'PaymentController@gatewayIpn')->name('ipn');
    Route::post('/khalti/payment/verify/{trx}', 'khaltiPaymentController@verifyPayment')->name('khalti.verifyPayment');
    Route::post('/khalti/payment/store','khaltiPaymentController@storePayment')->name('khalti.storePayment');


    Route::get('/language/{code?}', 'FrontendController@language')->name('language');


    Route::get('/blog-details/{slug}/{id}', 'FrontendController@blogDetails')->name('blogDetails');
    Route::get('/blog', 'FrontendController@blog')->name('blog');

    Route::get('/', 'FrontendController@index')->name('home');
    Route::get('/about', 'FrontendController@about')->name('about');
    Route::get('/services', 'FrontendController@services')->name('services');
    Route::get('/terms', 'FrontendController@terms')->name('terms');
    Route::get('/service-search', 'FrontendController@serviceSearch')->name('service.search');


    Route::post('/subscribe', 'FrontendController@subscribe')->name('subscribe');


    Route::get('/faq', 'FrontendController@faq')->name('faq');
    Route::get('/api-docs', 'FrontendController@apiDocs')->name('apiDocs');
    Route::get('/contact', 'FrontendController@contact')->name('contact');
    Route::post('/contact', 'FrontendController@contactSend')->name('contact.send');
    Route::get('/{getLink}/{content_id}', 'FrontendController@getLink')->name('getLink');

});




