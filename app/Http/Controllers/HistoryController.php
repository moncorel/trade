<?php

namespace App\Http\Controllers;

use App\Actions\Personal\History\HistoryIndexAction;
use Illuminate\Http\Request;

final class HistoryController extends Controller
{
    private HistoryIndexAction $historyIndexAction;

    public function __construct(
        HistoryIndexAction $historyIndexAction
    ) {
        $this->historyIndexAction = $historyIndexAction;
    }

    public function index()
    {
        $transactions = $this->historyIndexAction->execute();

        return view('personal.history', [
            'transactions' => $transactions->getTransactions()
        ]);
    }
}
