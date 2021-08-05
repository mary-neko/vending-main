<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')){
            Schema::create('products', function (Blueprint $table){
                $table->bigIncrements('id')->comment('ID');
                $table->string('company_id')->comment('会社ID');
                $table->foreign('company_id')
                ->references('company_name')->on('companies')
                ->onDelete('cascade');
                $table->string('product_name')->comment('製品名');
                $table->integer('price')->comment('値段');
                $table->integer('stock')->comment('在庫数');
                $table->text('comment')->nullable()->comment('コメント');
                $table->string('image')->nullable();
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
        Schema::dropIfExists('products');
        
        Schema::table('products',function(Blueprint $table){
            $table->dropForeign('products_company_id_foreign');
        });
    }
}