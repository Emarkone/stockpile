<?php

namespace App\Http\Livewire;

use App\Models\Inbound;
use Faker\Core\Number;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;

class LastInboundTable extends LivewireDatatable
{

  public $hidepagination = true;

  public function builder()
  {
    return Inbound::query()->orderBy('inbounds.created_at','desc')
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

      Column::name('buy_price')
      ->label('Buy price'),

      DateColumn::name('expiration_date')
      ->label('Expiration date'),

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
