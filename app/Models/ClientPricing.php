<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPricing extends Model
{
    use HasFactory;
    protected $fillable=
    ([
        'client_id','mode_of_pricing','weight','station','mode_of_convience','cost'
    ]);
}
