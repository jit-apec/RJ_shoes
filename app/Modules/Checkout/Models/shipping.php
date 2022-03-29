<?php

namespace App\Modules\Checkout\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    use HasFactory;
    protected $fillable=['user_id','first_name','last_name','email','phone_number','address','pincode'];
}
