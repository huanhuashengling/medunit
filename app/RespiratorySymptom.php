<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespiratorySymptom extends Model
{
    protected $fillable = ['respiratory_symptom_ch_label', 'respiratory_symptom_en_label','respiratory_symptom_description'];
}
