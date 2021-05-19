<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'province_id', 'district_id', 'village_id', 'regencies_id'
    ];
}
