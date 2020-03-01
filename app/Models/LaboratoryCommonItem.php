<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaboratoryCommonItem extends Model
{
  protected $fillable = ['bind_report_item_label', 
                      'find_by_label'
                      ];
}
