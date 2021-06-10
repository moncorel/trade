<?php

namespace App\Http\Controllers;

use App\Actions\Personal\SecuredDeal\SaveDealAction;
use App\Actions\Personal\SecuredDeal\SaveDealRequest;
use App\Http\Requests\SaveSecuredDealFormRequest;
use App\Models\Setting;
use Illuminate\Validation\ValidationException;

final class SecuredDealController extends Controller
{
    private SaveDealAction $saveDealAction;

    public function __construct(SaveDealAction $saveDealAction)
    {
        $this->saveDealAction = $saveDealAction;
    }

    public function index()
    {
        return view('personal.secured-deal', [
            'securedDealWarning' => Setting::getSetting(Setting::SECURED_DEAL_WARNING),
        ]);
    }

    public function createDeal()
    {
        return view('personal.secured-deal-create');
    }

    public function saveSecuredDeal(SaveSecuredDealFormRequest $request)
    {
        try {
            $this->saveDealAction->execute(
                new SaveDealRequest(
                    $request->deal_type,
                    $request->second_party_nickname,
                    $request->deal_conditions,
                    $request->deadline,
                    $request->currency,
                    $request->amount,
                    $request->deal_password
                )
            );
            return redirect(route('secured-deal.create'))
                ->with('secured_deal_success', "Secured Deal successfully created");
        } catch (ValidationException $e) {
            return redirect(route('secured-deal.create'))
                ->withErrors($e->validator->errors());
        }
    }
}
