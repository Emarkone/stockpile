<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\User;
use App\Planet;
use App\Region;
use App\Weapon;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class StockTable extends LivewireDatatable
{

  public function builder()
  {
    return Product::query();
  }

  public function columns()
  {
    return [

      
      Column::name('name')
        ->label('Product Name'),

      NumberColumn::scope(null, function($id) {
        $product = Product::find($id);
        return strval($product->inbounds->sum('quantity') - $product->outbounds->sum('quantity'));
      })->label('In stock')
      ->filterable(),
/*
      Column::name('planet.region.name')
        ->label('Region')
        ->filterable($this->regions)
        ->searchable(),

      Column::name('name')
        ->filterable()
        ->editable(),

      Column::name('comrades.name')
        ->label('Planet Mates')
        ->truncate()
        ->filterable(),

      Column::name('car.model')
        ->label('Car')
        ->alignCenter()
        ->filterable(['Audi', 'BMW', 'Caterham', 'Dodge', 'Ferrari', 'Jaguar', 'Lamborghini', 'Porsche']),

      BooleanColumn::scope('hasLightSaber', 'Light Saber')
        ->filterable(null, 'filterHasLightSaber')
        */
    ];
  }
}
