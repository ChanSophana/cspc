<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $filltable=['name','supid','catid','qty','inprice','outprice','onorder','description','userid','image','active'];
}
