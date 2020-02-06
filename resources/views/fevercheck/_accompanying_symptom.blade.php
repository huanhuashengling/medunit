<div class="tab-pane fade" id="nav-accompanying-symptom" role="tabpanel" aria-labelledby="nav-accompanying-symptom-tab">
  <div class="mb-3">
    <div class="form-group">
      <label for="constitutionalSymptom">全身症状</label>
      <div class="btn-group btn-group-toggle col" data-toggle="buttons">
        @foreach ($constitutionalSymptoms as $key => $constitutionalSymptom)
          <label class="btn btn-secondary">
            <input type="checkbox" name="options" id="constitutionalSymptomChLabel" checked value="{{$constitutionalSymptom->id}}"> {{$constitutionalSymptom->constitutional_symptom_ch_label}}
          </label>
        @endforeach
      </div>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-group">
      <label for="respiratorySymptom">呼吸系统</label>
      <div class="btn-group btn-group-toggle col" data-toggle="buttons">
      @foreach ($respiratorySymptoms as $key => $respiratorySymptom)
        <label class="btn btn-secondary">
          <input type="checkbox" name="options" id="respiratorySymptom" checked value="{{$respiratorySymptom->id}}"> {{$respiratorySymptom->respiratory_symptom_ch_label}}
        </label>
      @endforeach
      </div>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-group">
      <label for="circulatorySymptom">循环系统</label>
      <div class="btn-group btn-group-toggle col" data-toggle="buttons">
      @foreach ($circulatorySymptoms as $key => $circulatorySymptom)
        <label class="btn btn-secondary">
          <input type="checkbox" name="options" id="circulatorySymptom" checked value="{{$circulatorySymptom->id}}"> {{$circulatorySymptom->circulatory_symptom_ch_label}}
        </label>
      @endforeach
      </div>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-group">
      <label for="digestiveSymptom">消化系统</label>
      <div class="btn-group btn-group-toggle col" data-toggle="buttons">
      @foreach ($digestiveSymptoms as $key => $digestiveSymptom)
        <label class="btn btn-secondary">
          <input type="checkbox" name="options" id="digestiveSymptom" checked value="{{$digestiveSymptom->id}}"> {{$digestiveSymptom->digestive_symptom_ch_label}}
        </label>
      @endforeach
    </div>
  </div>
</div>

  <div class="mb-3">
    <div class="form-group">
      <label for="urogenitalSymptiom">泌尿生殖系统</label>
      <div class="btn-group btn-group-toggle col" data-toggle="buttons">
      @foreach ($urogenitalSymptioms as $key => $urogenitalSymptiom)
        <label class="btn btn-secondary">
          <input type="checkbox" name="options" id="urogenitalSymptiom" checked value="{{$urogenitalSymptiom->id}}"> {{$urogenitalSymptiom->urogenital_symptiom_ch_label}}
        </label>
      @endforeach
    </div>
  </div>
</div>

  <div class="mb-3">
    <div class="form-group">
      <label for="skinSoftTissue">皮肤软组织</label>
      <div class="btn-group btn-group-toggle col" data-toggle="buttons">
      @foreach ($skinSoftTissues as $key => $skinSoftTissue)
        <label class="btn btn-secondary">
          <input type="checkbox" name="options" id="skinSoftTissue" checked value="{{$skinSoftTissue->id}}"> {{$skinSoftTissue->skin_soft_tissue_ch_label}}
        </label>
      @endforeach
    </div>
    </div>
  </div>

  <div class="mb-3">
    <div class="form-group">
      <label for="nervousSystem">神经系统</label>
      <div class="btn-group btn-group-toggle col" data-toggle="buttons">
      @foreach ($nervousSystems as $key => $nervousSystem)
      <label class="btn btn-secondary">
        <input type="checkbox" name="options" id="nervousSystem" checked value="{{$nervousSystem->id}}"> {{$nervousSystem->nervous_system_ch_label}}
      </label>
      @endforeach
    </div>
  </div>
</div>
</div>