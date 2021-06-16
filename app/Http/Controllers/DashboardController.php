<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use App\Models\Outbound;
use App\Models\User;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function display() {
        return view(
            'dashboard',
            ['total_client' => User::query()->where('user_type','=','client')->count(),
            'total_supplier' => User::query()->where('user_type','=','supplier')->count(),
            'total_inbounds' => Inbound::query()->sum('quantity'),
            'total_outbounds' => Outbound::query()->sum('quantity'),
            'total_inbounds_cost' => Inbound::query()->sum(DB::raw('quantity*buy_price')),
            'total_outbounds_cost' => Outbound::query()->sum(DB::raw('quantity*sell_price')),
            'iochart' => $this->generateIOChart()
            ]
        );
    }

    public function generateIOChart() {
        return (new ColumnChartModel())
            ->setTitle('I/O Stats')
            ->addColumn('Inbound', Inbound::query()->sum('quantity'), '#f6ad55')
            ->addColumn('Outbound', Outbound::query()->sum('quantity'), '#fc8181');
    }
}
