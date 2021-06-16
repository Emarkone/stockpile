<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use App\Models\Outbound;
use App\Models\Product;
use App\Models\User;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\PieChartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Colors\RandomColor;

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
            'iochart' => $this->generateIOChart(),
            'stockchart' => $this->generateStockPieChart(),
            ]
        );
    }

    public function generateIOChart() {
        return (new ColumnChartModel())
            ->setTitle('I/O Stats')
            ->addColumn('Inbound', Inbound::query()->sum('quantity'), '#A5B2D7')
            ->addColumn('Outbound', Outbound::query()->sum('quantity'), '#BEB0EE');
    }

    public function generateStockPieChart() {
        $piChart = new PieChartModel();
        $products = Product::all();

        $piChart->setTitle('Products in stock');

        foreach ($products as $product) {
            $piChart->addSlice($product->name, $product->getStock(), RandomColor::one(array(
                'luminosity' => 'light',
                'hue' => 'blue',
                'format' => 'hex'
            )));
        }

        return $piChart;

    }
}
