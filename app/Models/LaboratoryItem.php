<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaboratoryItem extends Model
{
    protected $fillable = ['laboratory_type', 
                          'laboratory_item_label',
                          'laboratory_item_abb',
                          'refer_value_start',
                          'refer_value_end',
                          'item_unit'
                          ];


}
