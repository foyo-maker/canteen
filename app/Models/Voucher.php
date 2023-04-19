<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
   
    use HasFactory;
    protected $fillable = ['code','short_description','expire_date','qty','description','image','percentage'];

    public function vouchers()
    {
        return $this->hasMany(User_Voucher::class, 'voucher_id');
    }
}
