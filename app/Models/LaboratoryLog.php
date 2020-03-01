<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaboratoryLog extends Model
{
  protected $fillable = ['laboratory_reports_id', 
                          'laboratory_items_id',
                          'result_value',
                          'towards'
                          ];
}
