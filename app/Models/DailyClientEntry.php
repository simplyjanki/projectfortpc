<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyClientEntry extends Model
{
    use HasFactory;
    protected $fillable=
    ([
        'client_id','hawb_number','weight_range','weight_cost','destination','mode','total_charges','date_of_entry'
    ]);
}
