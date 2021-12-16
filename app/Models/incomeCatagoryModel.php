<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class incomeCatagoryModel extends Model
{
    public $table ='table_income_catagory';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = true;
}
