<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErythraType extends Model
{
    protected $fillable = ['erythra_type_ch_label', 'erythra_type_en_label','erythra_type_desc'];
}
