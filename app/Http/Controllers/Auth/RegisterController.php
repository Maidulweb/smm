<?php

namespace App\Http\Controllers\Auth;

use App\Http\Traits\Notify;
use App\Models\Template;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use Notify;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/user/order/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $info = json_decode(json_encode(getIpInfo()), true);
        $country_code = null;
        if (!empty($info['code'])) {
            $country_code = @$info['code'][0];
        }
        $countries = config('country');
        $templateSection = ['register'];
        $templates = Template::templateMedia()->whereIn('section_name', $templateSection)->get()->groupBy('section_name');
        return view('auth.register', compact('country_code', 'countries', 'templates'));
    }

    public function sponsor($sponsor)
    {
        session()->put('sponsor', $sponsor);
//        $info = json_decode(json_encode(getIpInfo()), true);
        $country_code = null;
        if (isset($info['code']) || !empty($info['code'])) {
            $country_code = @$info['code'][0];
        }
        $countries = config('country');

        return view(template() . 'auth.register', compact('sponsor', 'countries', 'country_code'));

    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        
        if (basicControl()->reCaptcha_status_registration) {
            $rules['g-recaptcha-response'] = ['sometimes', 'required','captcha'];
        }


        $rules['firstname'] = ['required', 'string', 'max:91'];
        $rules['lastname'] = ['required', 'string', 'max:91'];
        $rules['username'] = ['required', 'alpha_dash', 'min:5', 'unique:users,username'];
        $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users,email'];
        $rules['country_code'] = ['max:5'];
        $rules['phone_code'] = ['required'];
        $rules['phone'] = ['required'];
        $rules['password'] = ['required', 'string', 'confirmed'];

        return Validator::make($data, $rules, [
            'firstname.required' => 'First Name Field is required',
            'lastname.required' => 'Last Name Field is required',
            'phone' => 'The :attribute field contains an invalid number . ',
            'g-recaptcha-response.required' => 'The reCAPTCHA field is required . ',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        $basic = (object)config('basic');
        $sponsor = session()->get('sponsor');
        if ($sponsor != null) {
            $sponsorId = User::where('username', $sponsor)->first();
        } else {
            $sponsorId = null;
        }

        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone_code' => $data['phone_code'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(20),
            'email_verification' => ($basic->email_verification) ? 0 : 1,
            'sms_verification' => ($basic->sms_verification) ? 0 : 1,
            'referral_id' => ($sponsorId != null) ? $sponsorId->id : null,
        ]);


    }

    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        $msg = [
            'username' => $user->username,
        ];
        $action = [
            "link" => route('admin.user-edit', $user->id),
            "icon" => "fas fa-user text-white"
        ];

        $this->adminPushNotification('ADDED_USER', $msg, $action);

        $this->guard()->login($user);


        session()->forget('sponsor');

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        if ($request->ajax()) {
            return route('user . home');
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }


    /**
     * The user has been registered.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $user->last_login = Carbon::now();
        $user->save();
    }

    protected function guard()
    {
        return Auth::guard();
    }

}
