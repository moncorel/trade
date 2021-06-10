<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User([
            'nickname' => 'admin',
            'role' => 'admin',
            'password' => Hash::make(123123123),
            'email' => 'admin@gmail.com'
        ]);
        $admin->save();
        $admin->btcWallet()->save(new Wallet([
            'currency_type' => Wallet::BTC_TYPE,
            'address' => Str::random(Wallet::ADDRESS_LENGTH),
        ]));
        $admin->ethWallet()->save(new Wallet([
            'currency_type' => Wallet::ETH_TYPE,
            'address' => Str::random(Wallet::ADDRESS_LENGTH),
        ]));
        $admin->bchWallet()->save(new Wallet([
            'currency_type' => Wallet::BCH_TYPE,
            'address' => Str::random(Wallet::ADDRESS_LENGTH),
        ]));
    }
}
