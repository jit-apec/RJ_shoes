<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billing extends Model
{
    use HasFactory;
    protected $fillable=['user_id','first_name','last_name','status','email','phone_number','address','pincode'];
}
