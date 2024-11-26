<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'name',
         'phone',
         'email',
         'state', 
         'city',
         'district',
         'full_address',
         'status',
         'tracking_no',
     ];
 
}
