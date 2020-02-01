<div class="mb-3">
  <div class="form-group">
    <label for="constitutionalSymptom">全身症状</label>
    <select class="form-control" id="constitutionalSymptom">
      @foreach ($constitutionalSymptoms as $key => $constitutionalSymptom)
          <option class="form-control" value="{{$constitutionalSymptom->id}}">{{$constitutionalSymptom->constitutional_symptom_ch_label}}</option>
        @endforeach
    </select>
  </div>
</div>

<div class="mb-3">
  <div class="form-group">
    <label for="respiratorySymptom">呼吸系统</label>
    <select class="form-control" id="respiratorySymptom">
      @foreach ($respiratorySymptoms as $key => $respiratorySymptom)
        <option class="form-control" value="{{$respiratorySymptom->id}}">{{$respiratorySymptom->respiratory_symptom_ch_label}}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="mb-3">
  <div class="form-group">
    <label for="exampleFormControlSelect1">循环系统</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>胸闷</option>
      <option>心前区疼痛</option>
      <option>气促</option>
      <option>水肿</option>
    </select>
  </div>
</div>

<div class="mb-3">
  <div class="form-group">
    <label for="exampleFormControlSelect1">消化系统</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>恶心</option>
      <option>呕吐</option>
      <option>腹疼</option>
      <option>腹泻</option>
      <option>黑便</option>
      <option>黄疸</option>
    </select>
  </div>
</div>

<div class="mb-3">
  <div class="form-group">
    <label for="exampleFormControlSelect1">泌尿生殖系统</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>腰疼</option>
      <option>尿频</option>
      <option>尿急</option>
      <option>尿痛</option>
      <option>睾丸肿痛</option>
      <option>乳房肿块</option>
    </select>
  </div>
</div>

<div class="mb-3">
  <div class="form-group">
    <label for="exampleFormControlSelect1">皮肤软组织</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>皮疹</option>
      <option>皮肤色素沉积</option>
      <option>皮下结节</option>
      <option>皮下出血点</option>
      <option>皮肤溃疡</option>
      <option>局部皮肤肿痛</option>
    </select>
  </div>
</div>

<div class="mb-3">
  <div class="form-group">
    <label for="exampleFormControlSelect1">神经系统</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>头疼</option>
      <option>喷射性呕吐</option>
      <option>视物模糊</option>
      <option>神志改变</option>
      <option>肌力下降</option>
      <option>感觉异常</option>
    </select>
  </div>
</div>