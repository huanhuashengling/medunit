<div class="tab-pane fade show active" id="nav-basic-info" role="tabpanel" aria-labelledby="nav-basic-info-tab">
  <div class="row">
    <div class="col mb-3">
      <label for="medNum">Med 编号</label>
      <input type="text" class="form-control" id="medNum" placeholder="" value="" required="">
      <div class="invalid-feedback">
        Valid first name is required.
      </div>
    </div>
    <div class="col mb-3">
      <label for="hospitalName">医院</label>
      <input type="text" class="form-control" id="hospitalName" placeholder="" value="湘雅附二医院" required="">
      <div class="invalid-feedback">
        Valid last name is required.
      </div>
    </div>
    <div class="col mb-3">
      <label for="departmentName">科室</label>
      <input type="text" class="form-control" id="departmentName" placeholder="" value="发热门诊科" required="">
      <div class="invalid-feedback">
        Valid last name is required.
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col mb-3">
      <label for="bedNum">床号</label>
      <input type="text" class="form-control" id="bedNum" placeholder="" value="" required="">
      <div class="invalid-feedback">
        Valid first name is required.
      </div>
    </div>
    <div class="col mb-3">
      <label for="admissionNum">住院号</label>
      <input type="text" class="form-control" id="admissionNum" placeholder="" value="" required="">
      <div class="invalid-feedback">
        Valid last name is required.
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col mb-3">
      <label for="patientName">姓名</label>
      <input type="text" class="form-control" id="patientName" placeholder="" value="" required="">
      <div class="invalid-feedback">
        Valid first name is required.
      </div>
    </div>
    <div class="col mb-3">
      <label for="patientGender">性别</label>
      <input type="text" class="form-control" id="patientGender" placeholder="" value="" required="">
      <div class="invalid-feedback">
        Valid last name is required.
      </div>
    </div>
    <div class="col mb-3">
      <label for="patientBirthday">出生日期</label>
      <!-- <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" id="patientBirthday" placeholder="" value="" required=""> -->
      <input type="text" class="form-control datetimepicker-input" id="patientBirthday" data-toggle="datetimepicker" data-target="#patientBirthday"/>
      <div class="invalid-feedback">
        Valid last name is required.
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col mb-3">
      <label for="admissionDate">入院日期</label>
      <!-- <input type="text" class="form-control" id="admissionDate" placeholder="" value="" required=""> -->
      <input type="text" class="form-control datetimepicker-input" id="admissionDate" data-toggle="datetimepicker" data-target="#admissionDate"/>
      <div class="invalid-feedback">
        Valid first name is required.
      </div>
    </div>
    <div class="col mb-3">
      <label for="checkDate">记录日期</label>
      <!-- <input type="text" class="form-control" id="checkDate" placeholder="" value="" required=""> -->
      <input type="text" class="form-control datetimepicker-input" id="checkDate" data-toggle="datetimepicker" data-target="#checkDate"/>
      <div class="invalid-feedback">
        Valid first name is required.
      </div>
    </div>
    <div class="col mb-3">
      <label for="outAdmissionDate">出院日期</label>
      <!-- <input type="text" class="form-control" id="outAdmissionDate" placeholder="" value="" required=""> -->
      <input type="text" class="form-control datetimepicker-input" id="outAdmissionDate" data-toggle="datetimepicker" data-target="#outAdmissionDate"/>
      <div class="invalid-feedback">
        Valid last name is required.
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col mb-3">
      <label for="patientEthnic">民族</label>
      <input type="text" class="form-control" id="patientEthnic" placeholder="" value="" required="">
      <div class="invalid-feedback">
        Valid first name is required.
      </div>
    </div>
    <div class="col mb-3">
      <label for="nativePlace">籍贯(省、市)</label>
      <input type="text" class="form-control" id="nativePlace" placeholder="" value="" required="">
      <div class="invalid-feedback">
        Valid first name is required.
      </div>
    </div>
  </div>
</div>