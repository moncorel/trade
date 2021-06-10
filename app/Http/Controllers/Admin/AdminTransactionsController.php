<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Transaction\AddTransactionAction;
use App\Actions\Admin\Transaction\AddTransactionRequest;
use App\Actions\Admin\Transaction\ChangeStatusAction;
use App\Actions\Admin\Transaction\ChangeStatusRequest;
use App\Actions\Admin\Transaction\UpdateTransactionAction;
use App\Actions\Admin\Transaction\UpdateTransactionRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangeStatusFormRequest;
use App\Http\Requests\Admin\UpdateTransactionFormRequest;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AdminTransactionsController extends Controller
{
    private ChangeStatusAction $changeStatusAction;
    private AddTransactionAction $addTransactionAction;
    private UpdateTransactionAction $updateTransactionAction;

    public function __construct(
        ChangeStatusAction $changeStatusAction,
        AddTransactionAction $addTransactionAction,
        UpdateTransactionAction $updateTransactionAction
    ) {
        $this->updateTransactionAction = $updateTransactionAction;
        $this->changeStatusAction = $changeStatusAction;
        $this->addTransactionAction = $addTransactionAction;
    }

    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->paginate(25);
        return view('admin.transactions', compact('transactions'));
    }

    public function changeStatus(ChangeStatusFormRequest $request)
    {
        try {
            $response = $this->changeStatusAction->execute(
                new ChangeStatusRequest(
                    $request->status,
                    (int)$request->transaction_id
                )
            );
            if ($response) {
                if ($response->getUpdatedStatus() === 'success') {
                    return redirect()
                        ->back()
                        ->with('success', "Transaction was successfully approved!");
                }
                if ($response->getUpdatedStatus() === 'declined') {
                    return redirect()
                        ->back()
                        ->with('error', "Transaction was declined!");
                }
            }

            return redirect()->back();
        } catch (ValidationException $exception) {
            return redirect()
                ->back()
                ->with('error', $exception->validator->errors()->get('error')[0]);
        }
    }

    public function addTransaction(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'amount' => 'required|numeric|min:0',
                'type' => [
                    'required', 'string',
                    Rule::in([Transaction::WITHDRAW_TYPE, Transaction::DEPOSIT_TYPE, Transaction::TRANSFER_TYPE])
                ],
                'currency_type' => [
                    'required', 'string',
                    Rule::in([Wallet::BTC_TYPE, Wallet::BCH_TYPE, Wallet::ETH_TYPE])
                ],
                'sender_nickname' => 'string|nullable|required_if:type,'.Transaction::TRANSFER_TYPE .'required_if:type,'.Transaction::DEPOSIT_TYPE,
                'receiver_nickname' => 'string|nullable|required_if:type,'.Transaction::TRANSFER_TYPE,
                'external_address' => 'required_if:type,'.Transaction::WITHDRAW_TYPE
            ]
        );
        if (count($validator->errors()->messages())) {
            return redirect(route('admin.transactions'))
                ->withErrors($validator->errors()->messages())
                ->with('modal', 'create_transaction');
        }
        try {
            $this->addTransactionAction->execute(
                new AddTransactionRequest(
                    (float)$request->amount,
                    $request->type,
                    $request->currency_type,
                    $request->sender_nickname,
                    $request->receiver_nickname,
                    $request->external_address,
                )
            );
            return redirect(route('admin.transactions'))
                ->with('success', 'Transaction successfully added!');
        } catch (ValidationException $e) {
            return redirect(route('admin.transactions'))
                ->withErrors($e->validator->errors())
                ->with('modal', 'create_transaction');
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'transaction_id' => 'required|integer',
            'amount' => 'required|numeric|min:0',
            'status' => [
                'required', 'string',
                Rule::in([
                    Transaction::APPROVED_STATUS, Transaction::FAILED_STATUS, Transaction::PROCESSING_STATUS
                ])
            ],
            'created_at' => 'required|date_format:Y-m-d H:i:s',
            'with_commission' => 'numeric|nullable'
        ]);

        if (count($validator->errors()->messages())) {
            return redirect(route('admin.transactions'))
                ->withErrors($validator->errors()->messages())
                ->with([
                    'modal' => 'transactionModal',
                    'modal_id' => $request->transaction_id
                ]);
        }

        try {
            $this->updateTransactionAction->execute(
                new UpdateTransactionRequest(
                    (int)$request->transaction_id,
                    (float)$request->amount,
                    $request->status,
                    $request->created_at,
                    (float)$request->with_commission
                )
            );
            return redirect()
                ->back()
                ->with('success', "Transaction was successfully approved!");
        } catch (ValidationException $e) {
            return redirect(route('admin.transactions'))
                ->with([
                    'error' => $e->validator->errors()->get('error')[0]
                ]);
        }
    }
}
