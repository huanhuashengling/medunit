<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeverDegree extends Model
{
  protected $fillable = ['fever_degree_ch_label', 'fever_degree_en_label','fever_degree_desc'];
}
