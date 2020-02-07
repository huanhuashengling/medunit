<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
use App\Models\AbdominalPainLocation;
use App\Models\AbdominalPainType;
use App\Models\CirculatorySymptom;
use App\Models\ConstitutionalSymptom;
use App\Models\DigestiveSymptom;
use App\Models\ErythraType;
use App\Models\FeverDegree;
use App\Models\FeverType;
use App\Models\NervousSystem;
use App\Models\RespiratorySymptom;
use App\Models\SkinSoftTissue;
use App\Models\StoolType;
use App\Models\UrogenitalSymptiom;
use App\Models\HeadacheType;
use App\Models\UrineOutput;

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
    $abdominalPainLocations = AbdominalPainLocation::all();
    $abdominalPainTypes = AbdominalPainType::all();
    $stoolTypes = StoolType::all();
    $headacheTypes = HeadacheType::all();
    $urineOutputs = UrineOutput::all();
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
        "abdominalPainLocations",
        "abdominalPainTypes",
        "stoolTypes",
        "headacheTypes",
        "urineOutputs",
        "url",
      ));
  }
}
