<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoolType extends Model
{
  protected $fillable = ['stool_type_ch_label', 'stool_type_en_label','stool_type_desc'];
}
