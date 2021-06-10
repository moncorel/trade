<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RegistersUsers {
        register as parentRegister;
    }

    protected $redirectTo = RouteServiceProvider::PERSONAL;

    public function register(Request $request)
    {
        $errors = $this->validator($request->all())->errors()->toArray();

        if (count($errors)) {
            $request->flash();
            return redirect()->back()
                ->with('modal', 'register')
                ->withErrors($errors);
        }

        $this->parentRegister($request);

        return redirect(route('personal'));
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nickname' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'agreement' => ['required'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        Wallet::create([
            'currency_type' => Wallet::BTC_TYPE,
            'address' => Str::random(Wallet::ADDRESS_LENGTH),
            'owner_id' => $user->id
        ]);
        Wallet::create([
            'currency_type' => Wallet::ETH_TYPE,
            'address' => Str::random(Wallet::ADDRESS_LENGTH),
            'owner_id' => $user->id
        ]);
        Wallet::create([
            'currency_type' => Wallet::BCH_TYPE,
            'address' => Str::random(Wallet::ADDRESS_LENGTH),
            'owner_id' => $user->id
        ]);
        return $user;
    }

    public function showRegistrationForm()
    {
        return redirect('/')->with('modal', 'register');
    }
}
