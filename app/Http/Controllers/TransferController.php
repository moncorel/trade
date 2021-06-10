<?php

namespace App\Http\Controllers;

use App\Actions\Personal\Transfer\CreateTransferAction;
use App\Actions\Personal\Transfer\CreateTransferRequest;
use App\Constants\TransactionConstants;
use App\Helpers\TransferHelper;
use App\Http\Requests\CreateTransferFormRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

final class TransferController extends Controller
{
    private CreateTransferAction $createTransferAction;

    public function __construct(
        CreateTransferAction $createTransferAction
    ) {
        $this->createTransferAction = $createTransferAction;
    }

    public function index()
    {
        $minTransferAmount = (float)Setting::getSetting(Setting::MINIMUM_TRANSFER_AMOUNT);
        $commission = 1 + $this->convertCommissionFromPercents(
            (float)Setting::getSetting(Setting::TRANSFER_COMMISSION)
            );

        return view('personal.transfer', [
            'commission' => $commission,
            'minTransferAmount' => $minTransferAmount
        ]);
    }

    public function createTransfer(CreateTransferFormRequest $request)
    {
        try {
            $this->createTransferAction->execute(
                new CreateTransferRequest(
                    (float)$request->amount,
                    $request->address,
                    $request->currency
                )
            );
            return redirect(route('transfer'))
                ->with('transfer_success', 'Transfer was successfully completed!');
        } catch (ValidationException $e) {
            return redirect(route('transfer'))
                ->withErrors($e->validator->errors());
        }
    }

    private function convertCommissionFromPercents(float $percents)
    {
        return $percents / 100;
    }
}
