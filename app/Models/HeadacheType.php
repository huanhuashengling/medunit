<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeadacheType extends Model
{
  protected $fillable = ['headache_type_ch_label', 'headache_type_en_label','headache_type_desc'];
}
