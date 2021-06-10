<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])
    ->name('main');
Route::get('/about', [\App\Http\Controllers\MainController::class, 'about'])
    ->name('about');
Route::get('/terms-and-conditions', [\App\Http\Controllers\MainController::class, 'terms'])
    ->name('terms-and-conditions');
Route::get('/contact-us', [\App\Http\Controllers\MainController::class, 'contacts'])
    ->name('contact-us');
Route::get('/payment', [\App\Http\Controllers\MainController::class, 'payment'])
    ->name('payment');

Auth::routes();

Route::post('/auth/two-factor/confirm', [\App\Http\Controllers\Auth\TwoFactorAuthController::class, 'confirm'])
    ->name('auth.two-factor.confirm');

Route::group(['prefix' => 'personal', 'middleware' => 'auth'], function() {
    Route::get('/', 'PersonalController@index')->name('personal');

    Route::middleware('user')->group(function () {
        Route::get('/deposit', [\App\Http\Controllers\DepositController::class, 'index'])
            ->name('deposit');
        Route::post('/deposit', [\App\Http\Controllers\DepositController::class, 'createRequest'])
            ->name('deposit.create');
        Route::get('/withdraw', [\App\Http\Controllers\WithdrawController::class, 'index'])
            ->name('withdraw');
        Route::post('/withdraw', [\App\Http\Controllers\WithdrawController::class, 'createWithdraw'])
            ->name('withdraw.create');
        Route::get('/transfer', [\App\Http\Controllers\TransferController::class, 'index'])
            ->name('transfer');
        Route::post('/transfer', [\App\Http\Controllers\TransferController::class, 'createTransfer'])
            ->name('createTransfer');
        Route::get('/history', [\App\Http\Controllers\HistoryController::class, 'index'])
            ->name('history');
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [\App\Http\Controllers\SettingsController::class, 'index'])
            ->name('settings');
        Route::put('/information', [\App\Http\Controllers\SettingsController::class, 'updateInformation'])
            ->name('settings.update.information');
        Route::put('/password', [\App\Http\Controllers\SettingsController::class, 'updatePassword'])
            ->name('updatePassword');
        Route::post('/promocode', [\App\Http\Controllers\SettingsController::class, 'activatePromocode'])
            ->name('settings.promocode');
        Route::put('/auth-activate', [\App\Http\Controllers\SettingsController::class, 'activateTwoFactorAuth'])
            ->name('settings.auth.activate');
        Route::put('/auth-disable', [\App\Http\Controllers\SettingsController::class, 'sendDisableTwoFactorAuthCode'])
            ->name('settings.auth.disable');
        Route::post('/auth-disable', [\App\Http\Controllers\SettingsController::class, 'disableTwoFactorAuth'])
            ->name('settings.auth.disable.request');
    });

    Route::prefix('secured-deal')->group(function () {
        Route::get('/', [\App\Http\Controllers\SecuredDealController::class, 'index'])
            ->name('secured-deal');
        Route::get('/create', [\App\Http\Controllers\SecuredDealController::class, 'createDeal'])
            ->name('secured-deal.create');
        Route::post('/', [\App\Http\Controllers\SecuredDealController::class, 'saveSecuredDeal'])
            ->name('secured-deal.save');
    });

    Route::get('/trading', [\App\Http\Controllers\TradingController::class, 'index'])
        ->name('trading');

    Route::get('/support', [\App\Http\Controllers\SupportController::class, 'index'])
        ->name('support');
    Route::post('/support', [\App\Http\Controllers\SupportController::class, 'sendMessage'])
        ->name('sendMessage');
});

Route::prefix('admin')
    ->middleware('auth')
    ->middleware('admin')
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])
            ->name('admin.home');

        Route::prefix('users')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\AdminUsersController::class, 'index'])
                ->name('admin.users');
            Route::get('/create', [\App\Http\Controllers\Admin\AdminUsersController::class, 'createUser'])
                ->name('admin.users.create');
            Route::post('/', [\App\Http\Controllers\Admin\AdminUsersController::class, 'saveUser'])
                ->name('admin.users.save');
            Route::get('/{id}', [\App\Http\Controllers\Admin\AdminUsersController::class, 'getUserById'])
                ->name('admin.users.id');
            Route::put('/wallets', [\App\Http\Controllers\Admin\AdminUsersController::class, 'updateWallets'])
                ->name('admin.users.update');
            Route::delete('/{id}', [\App\Http\Controllers\Admin\AdminUsersController::class, 'deleteUserById'])
                ->name('admin.users.id.delete');
            Route::put('/{id}', [\App\Http\Controllers\Admin\AdminUsersController::class, 'updateUserById'])
                ->name('admin.users.id.update');
        });

        Route::prefix('settings')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'index'])
                ->name('admin.settings');
            Route::get('/main', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'mainPageSettings'])
                ->name('admin.settings.main-page');
            Route::get('/services', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'servicePageSettings'])
                ->name('admin.settings.services');
            Route::post('/services', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'updateServiceSettings'])
                ->name('admin.settings.services.update');
            Route::post('/common', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'updateCommonSettings'])
                ->name('admin.settings.common.update');
            Route::post('/main-page', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'updateMainPageSettings'])
                ->name('admin.settings.main-page.update');
        });

        Route::prefix('transactions')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\AdminTransactionsController::class, 'index'])
                ->name('admin.transactions');
            Route::put('/', [\App\Http\Controllers\Admin\AdminTransactionsController::class, 'changeStatus'])
                ->name('admin.transactions.change-status');
            Route::post('/', [\App\Http\Controllers\Admin\AdminTransactionsController::class, 'addTransaction'])
                ->name('admin.transactions.add');
            Route::post('/update', [\App\Http\Controllers\Admin\AdminTransactionsController::class, 'update'])
                ->name('admin.transactions.update');
        });
    });

Route::post('/botman', function () {
    app('botman')->listen();
});
