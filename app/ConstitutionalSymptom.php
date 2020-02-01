<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConstitutionalSymptom extends Model
{
    protected $fillable = ['constitutional_symptom_ch_label', 'constitutional_symptom_en_label','constitutional_symptom_description'];
}
