<?php

namespace App\Http\Controllers;

use App\Actions\Personal\Withdraw\CreateWithdrawAction;
use App\Actions\Personal\Withdraw\CreateWithdrawRequest;
use App\Actions\Personal\Withdraw\WithdrawIndexAction;
use App\Helpers\WithdrawHelper;
use App\Http\Requests\CreateWithdrawFormRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class WithdrawController extends Controller
{
    private WithdrawIndexAction $withdrawIndexAction;
    private CreateWithdrawAction $createWithdrawAction;

    public function __construct(
        WithdrawIndexAction $withdrawIndexAction,
        CreateWithdrawAction $createWithdrawAction
    ) {
        $this->withdrawIndexAction = $withdrawIndexAction;
        $this->createWithdrawAction = $createWithdrawAction;
    }

    public function index()
    {
        $transactions = $this->withdrawIndexAction->execute();
        $minWithdrawAmount = (float)Setting::getSetting(Setting::MINIMUM_WITHDRAW_AMOUNT);

        return view('personal.withdraw', [
            'withdrawals' => $transactions->getTransactions(),
            'minWithdrawAmount' => $minWithdrawAmount
        ]);
    }

    public function createWithdraw(CreateWithdrawFormRequest $request)
    {
        $this->createWithdrawAction->execute(
            new CreateWithdrawRequest(
                (float)$request->amount,
                $request->currency,
                $request->external_address
            )
        );

        return redirect(route('withdraw'))
            ->with('success', Setting::getSetting(Setting::WITHDRAW_MESSAGE));
    }
}
