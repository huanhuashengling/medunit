<div class="row">
<div class="col-md-10 col-xs-10 mb-3">
    <label for="firstName">主要症状</label>
    <textarea  class="form-control" id="firstName" placeholder="" value="" required="" rows="2"></textarea>
    <div class="invalid-feedback">
      Valid first name is required.
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 mb-3">
    <label for="lastName">时间</label>
    <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
    <div class="invalid-feedback">
      Valid last name is required.
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <label for="lastName">特征性伴随症状</label>
    <textarea class="form-control" id="lastName" placeholder="" value="" required="" rows="2"></textarea>
    <div class="invalid-feedback">
      Valid last name is required.
    </div>
  </div>

  <div class="col-md-6 mb-3">
    <label for="firstName">起病诱因</label>
    <textarea  class="form-control" id="firstName" placeholder="" value="" required="" rows="2"></textarea>
    <div class="invalid-feedback">
      Valid first name is required.
    </div>
  </div>

  <div class="col-md-6 mb-3">
    <label for="lastName">起病缓急</label>
    <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
    <div class="invalid-feedback">
      Valid last name is required.
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <label for="lastName">发热病程</label>
    <textarea class="form-control" id="lastName" placeholder="" value="" required="" rows="2"></textarea>
    <div class="invalid-feedback">
      Valid last name is required.
    </div>
  </div>

  <div class="col-md-6 mb-3">
    <div class="form-group">
      <label for="feverDegree">热度</label>
      <select class="form-control" id="feverDegree">
        @foreach ($feverDegrees as $key => $feverDegree)
          <option class="form-control" value="{{$feverDegree->id}}">{{$feverDegree->fever_degree_ch_label}} ({{$feverDegree->fever_degree_description}})</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="col-md-6 mb-3">
    <div class="form-group">
      <label for="feverType">热型</label>
      <select class="form-control" id="feverType">
        @foreach ($feverTypes as $key => $feverType)
          <option class="form-control" value="{{$feverType->id}}">{{$feverType->fever_ch_label}}  ({{$feverType->fever_description}})</option>
        @endforeach
      </select>
    </div>
  </div>
</div>