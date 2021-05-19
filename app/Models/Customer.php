<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $fillable = ['name', 'email', 'phone_number', 'address', 'status', 'district_id'];
}
