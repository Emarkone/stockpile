<?php

  

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateStocksView extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()

    {

        \DB::statement($this->createView());

    }

   

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()

    {

        \DB::statement($this->dropView());

    }

   

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    private function createView(): string

    {

        return <<<SQL

            CREATE VIEW stock_view_table AS

            SELECT id, name, active, IFNULL(stock,0) as stock, ROUND(IFNULL(avg_buy_price,0),2) as avg_buy_price, ROUND(IFNULL(avg_sell_price,0),2) as avg_sell_price, ROUND(IFNULL(avg_buy_price - avg_sell_price, 0),2) as avg_benefit FROM products LEFT JOIN (SELECT T1.idI as LOL, (T1.inbound_sum - T2.outbound_sum) AS stock, T1.avg_buy_price, T2.avg_sell_price FROM (select inbounds.product_id as idI, sum(inbounds.quantity) as inbound_sum, AVG(inbounds.buy_price) as avg_buy_price from `inbounds` group by inbounds.product_id) as T1 LEFT JOIN (select outbounds.product_id as idO, sum(outbounds.quantity) as outbound_sum, AVG(outbounds.sell_price) as avg_sell_price from `outbounds` group by outbounds.product_id) as T2 ON T1.idI = T2.idO) AS T3 ON T3.LOL = products.id

            SQL;

    }

   

    /**

     * Reverse the migrations.

     *

     * @return void

     */

    private function dropView(): string

    {

        return <<<SQL
            DROP VIEW IF EXISTS `stock_view_table`;
            SQL;

    }

}