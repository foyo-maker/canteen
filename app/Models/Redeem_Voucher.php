<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redeem_Voucher extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_email','voucher_id'];

    public function voucher() {

        return $this->belongsTo(Voucher::class);
    }
}
