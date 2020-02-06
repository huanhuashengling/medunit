<div class="tab-pane fade" id="nav-chief-complaint" role="tabpanel" aria-labelledby="nav-chief-complaint-tab">
  <div class="mb-3">
    <label for="chiefComplaint">主要症状</label>
    <textarea  class="form-control" id="chiefComplaint" placeholder="" value="" required="" rows="2"></textarea>
    <div class="invalid-feedback">
      Valid first name is required.
    </div>
  </div>



    <div class="mb-3">
      <label for="characteristicAccompanyingSymptom">特征性伴随症状</label>
      <textarea class="form-control" id="characteristicAccompanyingSymptom" placeholder="" value="" required="" rows="2"></textarea>
      <div class="invalid-feedback">
        Valid last name is required.
      </div>
    </div>

    <div class="mb-3">
      <label for="firstName">起病诱因</label>
      <textarea  class="form-control" id="firstName" placeholder="" value="" required="" rows="2"></textarea>
      <div class="invalid-feedback">
        Valid first name is required.
      </div>
    </div>

    <div class="mb-3">
      <label for="lastName">起病缓急</label>
      <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
      <div class="invalid-feedback">
        Valid last name is required.
      </div>
    </div>
    <div class="mb-3">
      <label for="lastName">发热病程</label>
      <textarea class="form-control" id="lastName" placeholder="" value="" required="" rows="2"></textarea>
      <div class="invalid-feedback">
        Valid last name is required.
      </div>
    </div>
  <div class="row">
      <div class="col mb-3">
    <label for="ccTime">时间</label>
    <!-- <input type="text" class="form-control" id="ccTime" placeholder="" value="" required=""> -->
    <input type="text" class="form-control datetimepicker-input" id="ccTime" data-toggle="datetimepicker" data-target="#ccTime"/>
    <div class="invalid-feedback">
      Valid last name is required.
    </div>
  </div>

    <div class="col mb-3">
      <div class="form-group">
        <label for="feverDegree">热度</label>
        <select class="form-control" id="feverDegree">
          @foreach ($feverDegrees as $key => $feverDegree)
            <option class="form-control" value="{{$feverDegree->id}}">{{$feverDegree->fever_degree_ch_label}} ({{$feverDegree->fever_degree_desc}})</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

    <div class="mb-3">
      <div class="form-group">
        <label for="feverType">热型</label>
        <select class="form-control" id="feverType">
          @foreach ($feverTypes as $key => $feverType)
            <option class="form-control" value="{{$feverType->id}}">{{$feverType->fever_ch_label}}  ({{$feverType->fever_desc}})</option>
          @endforeach
        </select>
      </div>
    </div>
</div>
