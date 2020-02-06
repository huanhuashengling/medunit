<div class="tab-pane fade" id="nav-accompanying-symptom" role="tabpanel" aria-labelledby="nav-accompanying-symptom-tab">
  <div class="mb-3">
    <div class="form-group">
      <label for="constitutionalSymptom" class="col">全身症状</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
        @foreach ($constitutionalSymptoms as $key => $constitutionalSymptom)
          <button type="button" class="btn btn-outline-info" id="constitutionalSymptom{{$key}}" checked value="{{$constitutionalSymptom->id}}">{{$constitutionalSymptom->constitutional_symptom_ch_label}}</button>
        @endforeach
      </div>
    </div>
  </div>
  <div class="mb-3">
    <div class="form-group">
      <label for="respiratorySymptom" class="col">呼吸系统</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($respiratorySymptoms as $key => $respiratorySymptom)
        <button type="button" class="btn btn-outline-info" id="respiratorySymptom{{$key}}" checked value="{{$respiratorySymptom->id}}">{{$respiratorySymptom->respiratory_symptom_ch_label}}</button>
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

  <div class="row col mb-3">
    <div class="form-group">
      <label for="digestiveSymptom">呕吐物性状</label>
      <input type="text" class="form-control" id="bedNum" placeholder="" value="" required="">
    </div>
    <div class="form-group">
      <label for="digestiveSymptom">频次</label>
      <input type="text" class="form-control" id="bedNum" placeholder="" value="" required="">
    </div>
  </div>

    <div class="mb-3">
    <div class="form-group">
      <label for="digestiveSymptom" class="col">腹痛部位</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($abdominalPainLocations as $key => $abdominalPainLocation)
      <button type="button" class="btn btn-outline-info" id="abdominalPainLocation{{$key}}" checked value="{{$abdominalPainLocation->id}}">{{$abdominalPainLocation->abdominal_pain_location_ch_label}}</button>
      @endforeach
    </div>
  </div>
</div>

  <div class="mb-3">
    <div class="form-group">
      <label for="digestiveSymptom" class="col">腹痛性质</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($digestiveSymptoms as $key => $digestiveSymptom)
      <button type="button" class="btn btn-outline-info" id="digestiveSymptom{{$key}}" checked value="{{$digestiveSymptom->id}}">{{$digestiveSymptom->digestive_symptom_ch_label}}</button>
      @endforeach
    </div>
  </div>
</div>

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
    <div class="form-group">
      <label for="skinSoftTissue" class="col">皮肤软组织</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($skinSoftTissues as $key => $skinSoftTissue)
          <button type="button" class="btn btn-outline-info" id="skinSoftTissue{{$key}}" checked value="{{$skinSoftTissue->id}}">{{$skinSoftTissue->skin_soft_tissue_ch_label}}</button>
      @endforeach
    </div>
    </div>
  </div>

  <div class="mb-3" id="erythraType">
    <div class="form-group col">
      <label for="erythraType">皮疹类型</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($erythraTypes as $key => $erythraType)
        <button type="button" class="btn btn-outline-info" id="erythraType{{$key}}" checked value="{{$erythraType->id}}">{{$erythraType->erythra_type_ch_label}}</button>
      @endforeach
    </div>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-group">
      <label for="nervousSystem" class="col">神经系统</label>
      <div class="btn-group" role="group" data-toggle="button" aria-label="Basic example">
      @foreach ($nervousSystems as $key => $nervousSystem)
        <button type="button" class="btn btn-outline-info" id="nervousSystem{{$key}}" checked value="{{$nervousSystem->id}}">{{$nervousSystem->nervous_system_ch_label}}</button>
      @endforeach
    </div>
  </div>
</div>
</div>