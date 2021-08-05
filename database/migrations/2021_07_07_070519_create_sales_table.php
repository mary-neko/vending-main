<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        if(!Schema::hasTable('sales')){
            Schema::create('sales', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->biginteger('product_id')->unsigned();
                $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('sales');
        Schema::table('sales',function(Blueprint $table){
            $table->dropForeign('sales_product_id_foreign');
        });
    }
}