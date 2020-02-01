<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigestiveSymptom extends Model
{
  protected $fillable = ['digestive_symptom_ch_label', 'digestive_symptom_en_label','digestive_symptom_description'];
}
