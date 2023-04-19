<?php

namespace App\Models;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User_Voucher extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_email','voucher_id','current_used'];

    public function voucher() {

        return $this->belongsTo(Voucher::class);
    }

}
