<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbdominalPainType extends Model
{
  protected $fillable = ['abdominal_pain_type_ch_label', 'abdominal_pain_type_en_label','abdominal_pain_type_desc'];
}
