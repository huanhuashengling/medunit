<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbdominalPainLocation extends Model
{
  protected $fillable = ['abdominal_pain_location_ch_label', 'abdominal_pain_location_en_label','abdominal_pain_location_desc'];
}
