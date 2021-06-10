<?php

namespace App\Http\Controllers;

use App\Actions\Personal\Deposit\CreateDepositAction;
use App\Actions\Personal\Deposit\CreateDepositRequest;
use App\Actions\Personal\Deposit\DepositIndexAction;
use App\Http\Requests\CreateDepositFormRequest;
use App\Models\Setting;
use Illuminate\Support\Str;

final class DepositController extends Controller
{
    private DepositIndexAction $depositIndexAction;
    private CreateDepositAction $createDepositAction;

    public function __construct(
        DepositIndexAction $depositIndexAction,
        CreateDepositAction $createDepositAction
    ) {
        $this->depositIndexAction = $depositIndexAction;
        $this->createDepositAction = $createDepositAction;
    }

    public function index()
    {
        $response = $this->depositIndexAction->execute();
        $minDepositAmount = (float)Setting::getSetting(Setting::MINIMUM_DEPOSIT_AMOUNT);

        return view('personal.deposit', [
            'transactions' => $response->getTransactions(),
            'minDepositAmount' => $minDepositAmount
        ]);
    }

    public function createRequest(CreateDepositFormRequest $request)
    {
        $response = $this->createDepositAction->execute(
            new CreateDepositRequest(
                (float)$request->amount,
                $request->currency
            )
        );

        $data = [
            'external_address' => $response->getExternalAddress(),
            'number' => $response->getNumber(),
            'amount' => $response->getAmount(),
            'currency' => Str::upper($response->getCurrencyType())
        ];

        return redirect(route('deposit'))
            ->with(['deposit' => $data]);
    }
}
