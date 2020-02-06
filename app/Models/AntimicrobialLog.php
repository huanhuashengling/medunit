<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AntimicrobialLog extends Model
{
  protected $fillable = ['mednum', 'kind_of_antimicrobial','drug_name', 'dose', 'begin_date', 'end_date', 'efficacy'];
}
