<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
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
    protected $redirectTo = '/login';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'alpha_num','between:6,15','confirmed'],
            'last_name' => ['required', 'string', 'max:10'],
            'first_name' => ['required', 'string', 'max:10'],
            'zipcode' => ['required', 'numeric','digits:7'],
            'prefecture' => ['required', 'string', 'max:5'],
            'municipality' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:15'],
            'apartments' => ['required', 'string', 'max:20'],
            'email' => ['email', 'max:128','unique:m_users'],
            'phone_number' => ['required','string','numeric', 'digits_between:1,15'],
        ],
        [   
            'password.required' => 'パスワードは必須項目です。',
            'last_name.required' => '姓は必須項目です。',
            'first_name.required' => '名は必須項目です。',
            'zipcode.required' => '郵便番号は必須項目です。',
            'prefecture.required' => '都道府県は必須項目です。',
            'municipality.required' => '市町村区は必須項目です。',
            'address.required' => '番地は必須項目です。',
            'apartments.required' => 'マンション・部屋番号は必須項目です。',
            'phone_number.required' => '電話番号は必須項目です。',
            'password.alpha_num' => 'パスワードは半角英数字で入力してください。',
            'zipcode.integer' => '郵便番号は半角数字で入力してください。',
            'password.between' => 'パスワードは6文字以上15文字以内で入力してください。',
            'last_name.max' => '姓は10文字以内で入力してください。',
            'first_name.max' => '名は10文字以内で入力してください。',
            'zipcode.digits' => '郵便番号は7桁で入力してください。',
            'prefecture.max' => '都道府県は5文字以内で入力してください。',
            'municipality.max' => '市町村区は10文字以内で入力してください。',
            'address.max' => '番地は15文字以内で入力してください。',
            'apartments.max' => 'マンション・部屋番号は20文字以内で入力してください。',
            'email.max' => 'メールアドレスは128文字以内で入力してください。',
            'phone_number.digits_between' => '電話番号は15文字以内で入力してください。',
            'email.email' => 'メールアドレスはメールアドレス形式（〇〇@△△.comなど）で入力してください。',
            'email.alpha_num' => 'メールアドレスは半角英数字で入力してください。',
            'email.max' => 'メールアドレスは128文字以内で入力してください。',
            'email.unique' => '同一のメールアドレスは登録できません。他のメールアドレスを入力してください。',
            'password.confirmed' => '入力されたパスワードが一致していません。',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'password' => Hash::make($data['password']),
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'zipcode' => $data['zipcode'],
            'prefecture' => $data['prefecture'],
            'municipality' => $data['municipality'],
            'address' => $data['address'],
            'apartments' => $data['apartments'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
        ]);
    }
}