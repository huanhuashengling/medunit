<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeverType;
use App\FeverDegree;
use App\CirculatorySymptom;
use App\ConstitutionalSymptom;
use App\RespiratorySymptom;
use App\DigestiveSymptom;
class FeverCheckController extends Controller
{
  public function index()
  {
    $feverTypes = FeverType::all();
    $feverDegrees = FeverDegree::all();
    $circulatorySymptoms = CirculatorySymptom::all();
    $constitutionalSymptoms = ConstitutionalSymptom::all();
    $respiratorySymptoms = RespiratorySymptom::all();
    $digestiveSymptoms = DigestiveSymptom::all();
    return view('fevercheck.index', 
      compact("feverTypes", 
        "feverDegrees",
        "circulatorySymptoms",
        "constitutionalSymptoms",
        "respiratorySymptoms",
        "digestiveSymptoms"));
  }
}
