<div class="tab-pane fade" id="nav-accompanying-symptom" role="tabpanel" aria-labelledby="nav-accompanying-symptom-tab">
  <div class="mb-3">
    <div class="form-group">
      <label for="constitutionalSymptom" class="col">全身症状</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
        @foreach ($constitutionalSymptoms as $key => $constitutionalSymptom)
          <button type="button" class="btn btn-outline-info multi-btn" style="padding: 5px;" id="constitutionalSymptom{{$key}}" checked value="{{$constitutionalSymptom->id}}">{{$constitutionalSymptom->constitutional_symptom_ch_label}}</button>
        @endforeach
      </div>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-group">
      <label for="respiratorySymptom" class="col">呼吸系统</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($respiratorySymptoms as $key => $respiratorySymptom)
        <button type="button" class="btn btn-outline-info" style="padding: 5px;"  id="respiratorySymptom{{$key}}" checked value="{{$respiratorySymptom->id}}">{{$respiratorySymptom->respiratory_symptom_ch_label}}</button>
      @endforeach
      </div>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-group">
      <label for="circulatorySymptom" class="col">循环系统</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($circulatorySymptoms as $key => $circulatorySymptom)
      <button type="button" class="btn btn-outline-info" id="circulatorySymptom{{$key}}" checked value="{{$circulatorySymptom->id}}">{{$circulatorySymptom->circulatory_symptom_ch_label}}</button>
      @endforeach
      </div>
    </div>
  </div>


  <div class="mb-3">
    <div class="form-group">
      <label for="digestiveSymptom" class="col">消化系统</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($digestiveSymptoms as $key => $digestiveSymptom)
      <button type="button" class="btn btn-outline-info" id="digestiveSymptom{{$key}}" checked value="{{$digestiveSymptom->id}}">{{$digestiveSymptom->digestive_symptom_ch_label}}</button>
      @endforeach
    </div>
  </div>
</div>
<div class="d-none" id="vomitExpand">
    <div class="row">
      <div class="form-group col mb-3">
        <label for="matureOfVomit">呕吐物性状</label>
        <input type="text" class="form-control" id="matureOfVomit" placeholder="" value="" required="">
      </div>
      <div class="form-group col mb-3">
        <label for="frequencyOfVomit">频次</label>
        <input type="text" class="form-control" id="frequencyOfVomit" placeholder="" value="" required="">
      </div>
    </div>
</div>



<div class="d-none" id="abdominalPainExpand">
  <div class="mb-3">
    <div class="form-group">
      <label for="abdominalPainLocation" class="col">腹痛部位</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($abdominalPainLocations as $key => $abdominalPainLocation)
      <button type="button" class="btn btn-outline-info abdominal-pain-location" style="padding: 5px;" id="abdominalPainLocation{{$key}}" checked value="{{$abdominalPainLocation->id}}">{{$abdominalPainLocation->abdominal_pain_location_ch_label}}</button>
      @endforeach
      </div>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-group">
      <label for="abdominalPainType" class="col">腹痛性质</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($abdominalPainTypes as $key => $abdominalPainType)
      <button type="button" class="btn btn-outline-info abdominal-pain-type" id="abdominalPainType{{$key}}" checked value="{{$abdominalPainType->id}}">{{$abdominalPainType->abdominal_pain_type_ch_label}}</button>
      @endforeach
      </div>
    </div>
  </div>
</div>

<div class="d-none" id="stoolExpand">
  <div class="row">
    <div class="form-group col mb-3">
      <label for="stoolFrequency">腹泻频次</label>
      <input type="text" class="form-control" id="stoolFrequency" placeholder="" value="" required="">
    </div>
    <div class="form-group col mb-3">
      <label for="stoolType">大便性状</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($stoolTypes as $key => $stoolType)
      <button type="button" class="btn btn-outline-info stool-type" id="stoolType{{$key}}" checked value="{{$stoolType->id}}">{{$stoolType->stool_type_ch_label}}</button>
      @endforeach
      </div>
    </div>
  </div>
</div>

<hr />

  <div class="mb-3">
    <div class="form-group">
      <label for="urogenitalSymptiom" class="col">泌尿生殖系统</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($urogenitalSymptioms as $key => $urogenitalSymptiom)
        <button type="button" class="btn btn-outline-info" id="urogenitalSymptiom{{$key}}" checked value="{{$urogenitalSymptiom->id}}">{{$urogenitalSymptiom->urogenital_symptiom_ch_label}}</button>
      @endforeach
    </div>
  </div>
  </div>

<div class="mb-3">
      <div class="form-group col">
        <label for="urineOutput">尿量</label>
        <select class="form-control" id="urineOutput">
          @foreach ($urineOutputs as $key => $urineOutput)
            <option class="form-control" value="{{$urineOutput->id}}">{{$urineOutput->urine_output_ch_label}} ({{$urineOutput->urine_output_desc}})</option>
          @endforeach
        </select>
      </div>
    </div>

<hr />
  <div class="mb-3">
    <div class="form-group">
      <label for="skinSoftTissue" class="col">皮肤软组织</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($skinSoftTissues as $key => $skinSoftTissue)
          <button type="button" class="btn btn-outline-info" style="padding: 5px;" id="skinSoftTissue{{$key}}" checked value="{{$skinSoftTissue->id}}">{{$skinSoftTissue->skin_soft_tissue_ch_label}}</button>
      @endforeach
    </div>
    </div>
  </div>
<div class="d-none" id="erythraExpand">
  <div class="mb-3" id="erythraType">
    <div class="form-group col">
      <label for="erythraType">皮疹类型</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($erythraTypes as $key => $erythraType)
        <button type="button" class="btn btn-outline-info erythra-type" id="erythraType{{$key}}" checked value="{{$erythraType->id}}">{{$erythraType->erythra_type_ch_label}}</button>
      @endforeach
    </div>
    </div>
  </div>
</div>

<hr />
  <div class="mb-3">
    <div class="form-group">
      <label for="nervousSystem" class="col">神经系统</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($nervousSystems as $key => $nervousSystem)
        <button type="button" class="btn btn-outline-info" style="padding: 5px;" id="nervousSystem{{$key}}" checked value="{{$nervousSystem->id}}">{{$nervousSystem->nervous_system_ch_label}}</button>
      @endforeach
    </div>
  </div>
</div>

<div class="d-none" id="headacheExpand">
  <div class="row">
    <div class="form-group col-4 mb-3">
      <label for="headacheLocation">部位</label>
      <input type="text" class="form-control" id="headacheLocation" placeholder="" value="" required="">
    </div>
    <div class="form-group col-8 mb-3">
      <label for="headacheType">性质</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($headacheTypes as $key => $headacheType)
      <button type="button" class="btn btn-outline-info headache-type" style="padding: 5px;" id="headacheType{{$key}}" checked value="{{$headacheType->id}}">{{$headacheType->headache_type_ch_label}}</button>
      @endforeach
      </div>
    </div>
  </div>
</div>
<hr />
</div>