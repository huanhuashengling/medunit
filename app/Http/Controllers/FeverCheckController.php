<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use App\FeverType;
use App\FeverDegree;
use App\CirculatorySymptom;
use App\ConstitutionalSymptom;
use App\RespiratorySymptom;
use App\DigestiveSymptom;
use App\UrogenitalSymptiom;
use App\SkinSoftTissue;
use App\ErythraType;
use App\NervousSystem;

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
    $urogenitalSymptioms = UrogenitalSymptiom::all();
    $skinSoftTissues = SkinSoftTissue::all();
    $erythraTypes = ErythraType::all();
    $nervousSystems = NervousSystem::all();
    $url = URL::full();
    return view('fevercheck.index', 
      compact("feverTypes", 
        "feverDegrees",
        "circulatorySymptoms",
        "constitutionalSymptoms",
        "respiratorySymptoms",
        "digestiveSymptoms",
        "urogenitalSymptioms",
        "skinSoftTissues",
        "erythraTypes",
        "nervousSystems",
        "url",
      ));
  }
}
