<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //テーブル名
    protected $table = 'products';

    //可変項目
    protected $fillable = 
    [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'image',
        'created_at',
        'updated_at'
    ];
}
