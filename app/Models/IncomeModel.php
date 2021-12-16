<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeModel extends Model
{
    public $table ='table_income';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = true;
}
