<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_byed extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id','peoduct_id','phon','address','city'
    ];
}
