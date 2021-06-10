<?php

namespace App\Http\Controllers;

use App\Actions\Personal\Dashboard\DashboardIndexAction;
use Illuminate\Http\Request;

final class PersonalController extends Controller
{
    private DashboardIndexAction $dashboardIndexAction;

    public function __construct(
        DashboardIndexAction $dashboardIndexAction
    )
    {
        $this->middleware('auth');
        $this->dashboardIndexAction = $dashboardIndexAction;
    }

    public function index()
    {
        $response = $this->dashboardIndexAction->execute();

        return view('personal.index', [
            'total_money' => $response->getTotalMoney(),
            'courses' => [
                'btc' => $response->getBtcCourseToUSD(),
                'bch' => $response->getBchCourseToUSD(),
                'eth' => $response->getEthCourseToUSD()
            ]
        ]);
    }
}
