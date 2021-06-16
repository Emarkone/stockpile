<?php

namespace App\Http\Livewire;

use App\Models\Inbound;
use App\Models\Outbound;
use Faker\Core\Number;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;

class LastOutboundTable extends LivewireDatatable
{

  public $hidepagination = true;
  
  public function builder()
  {
    return Outbound::query()->orderBy('outbounds.created_at','desc')
    ->leftJoin('products','product_id','products.id')
    ->leftJoin('users','user_id','users.id')->limit(5);
  }

  public function columns()
  {

    

    return [

      NumberColumn::name('id')
        ->label('ID'),
      
      Column::name('products.name')
        ->label('Product name'),

      Column::name('users.name')
        ->label('User'),

      Column::name('quantity')
        ->label('In stock'),

      Column::name('sell_price')
        ->label('Buy price'),

      TimeColumn::name('created_at')
        ->label('Created at'),

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
