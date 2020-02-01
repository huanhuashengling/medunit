<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CirculatorySymptom extends Model
{
    protected $fillable = ['circulatory_symptom_ch_label', 'circulatory_symptom_en_label','circulatory_symptom_description'];
}
