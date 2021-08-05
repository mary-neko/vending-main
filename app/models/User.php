<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //テーブル名
    protected $table = 'sales';

    //可変項目
    protected $fillable =
    [
        'name',
        'email',
        'email_verified_at',
        'password'
    ];
}
