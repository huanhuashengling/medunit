<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeverType extends Model
{
  protected $fillable = ['fever_ch_label', 'fever_en_label','fever_description'];
}
