<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>Medunit</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/tempusdominus-bootstrap-4.min.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <script src="/js/jquery.min.js"></script>
  <script src="/js/Moment.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="/js/input/input.js?v={{rand()}}"></script>
    <!-- Styles -->
    <style>
      html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-size: 12px;
        height: 100vh;
        margin: 0;
      }
      .nav-link {
        padding-top: 0.5rem;
        padding-right: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0.5rem;
      }
      .container {
        max-width: 786px;
      }
      
    </style>
  </head>
  <body>
    <div class="container">
      <input type="hidden" id="url" name="" value="{{$url}}">
      <div class="py-5 text-center">
        <h2><img class="d-block mx-auto mb-4" src="/docs/assets/brand/doctor.svg" alt="" width="72" height="72">发热查因</h2>
      </div>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-basic-info-tab" data-toggle="tab" href="#nav-basic-info" role="tab" aria-controls="nav-basic-info" aria-selected="true">基本信息</a>
          <a class="nav-item nav-link" id="nav-chief-complaint-tab" data-toggle="tab" href="#nav-chief-complaint" role="tab" aria-controls="nav-chief-complaint" aria-selected="false">主诉</a>
          <a class="nav-item nav-link" id="nav-accompanying-symptom-tab" data-toggle="tab" href="#nav-accompanying-symptom" role="tab" aria-controls="nav-accompanying-symptom" aria-selected="false">伴随症状</a>
          <a class="nav-item nav-link" id="nav-diagnosis-treatment-hitory-tab" data-toggle="tab" href="#nav-diagnosis-treatment-hitory" role="tab" aria-controls="nav-diagnosis-treatment-hitory" aria-selected="false">诊疗经过</a>
          <a class="nav-item nav-link" id="nav-patient-medical-history-tab" data-toggle="tab" href="#nav-patient-medical-history" role="tab" aria-controls="nav-patient-medical-history" aria-selected="false">既往史</a>
          <a class="nav-item nav-link" id="nav-patient-history-tab" data-toggle="tab" href="#nav-patient-history" role="tab" aria-controls="nav-patient-history" aria-selected="false">个人史</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
          @include('fevercheck._basic_info')
          @include('fevercheck._chief_complaint')
          @include('fevercheck._accompanying_symptom')
          @include('fevercheck._diagnosis_treatment_hitory')
          @include('fevercheck._patient_medical_history')
          @include('fevercheck._patient_history')
      </div>
<!--

  <div class="col-md-8 order-md-1">
    <form class="needs-validation" novalidate="">

      <div class="mb-3">
        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
      </div>

      <div class="row">
        <div class="col-md-5 mb-3">
          <label for="country">Country</label>
          <select class="custom-select d-block w-100" id="country" required="">
            <option value="">Choose...</option>
            <option>United States</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="state">State</label>
          <select class="custom-select d-block w-100" id="state" required="">
            <option value="">Choose...</option>
            <option>California</option>
          </select>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="zip">Zip</label>
          <input type="text" class="form-control" id="zip" placeholder="" required="">
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div>
      </div>
      <hr class="mb-4">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="same-address">
        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="save-info">
        <label class="custom-control-label" for="save-info">Save this information for next time</label>
      </div>
      <hr class="mb-4">

      <h4 class="mb-3">Payment</h4>

      <div class="d-block my-3">
        <div class="custom-control custom-radio">
          <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
          <label class="custom-control-label" for="credit">Credit card</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
          <label class="custom-control-label" for="debit">Debit card</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
          <label class="custom-control-label" for="paypal">PayPal</label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="cc-name">Name on card</label>
          <input type="text" class="form-control" id="cc-name" placeholder="" required="">
          <small class="text-muted">Full name as displayed on card</small>
          <div class="invalid-feedback">
            Name on card is required
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="cc-number">Credit card number</label>
          <input type="text" class="form-control" id="cc-number" placeholder="" required="">
          <div class="invalid-feedback">
            Credit card number is required
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="cc-expiration">Expiration</label>
          <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
          <div class="invalid-feedback">
            Expiration date required
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="cc-cvv">CVV</label>
          <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
          <div class="invalid-feedback">
            Security code required
          </div>
        </div>
      </div>
      <hr class="mb-4">
      <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
    </form>
  </div>


  <div class="col-md-8 order-md-1">
    <h4 class="mb-3">Billing address</h4>
    <form class="needs-validation" novalidate="">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">First name</label>
          <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
          <div class="invalid-feedback">
            Valid first name is required.
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
          <div class="invalid-feedback">
            Valid last name is required.
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="username">Username</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">@</span>
          </div>
          <input type="text" class="form-control" id="username" placeholder="Username" required="">
          <div class="invalid-feedback" style="width: 100%;">
            Your username is required.
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="email">Email <span class="text-muted">(Optional)</span></label>
        <input type="email" class="form-control" id="email" placeholder="you@example.com">
        <div class="invalid-feedback">
          Please enter a valid email address for shipping updates.
        </div>
      </div>

      <div class="mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
        <div class="invalid-feedback">
          Please enter your shipping address.
        </div>
      </div>

      <div class="mb-3">
        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
      </div>

      <div class="row">
        <div class="col-md-5 mb-3">
          <label for="country">Country</label>
          <select class="custom-select d-block w-100" id="country" required="">
            <option value="">Choose...</option>
            <option>United States</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid country.
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <label for="state">State</label>
          <select class="custom-select d-block w-100" id="state" required="">
            <option value="">Choose...</option>
            <option>California</option>
          </select>
          <div class="invalid-feedback">
            Please provide a valid state.
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="zip">Zip</label>
          <input type="text" class="form-control" id="zip" placeholder="" required="">
          <div class="invalid-feedback">
            Zip code required.
          </div>
        </div>
      </div>
      <hr class="mb-4">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="same-address">
        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
      </div>
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="save-info">
        <label class="custom-control-label" for="save-info">Save this information for next time</label>
      </div>
      <hr class="mb-4">

      <h4 class="mb-3">Payment</h4>

      <div class="d-block my-3">
        <div class="custom-control custom-radio">
          <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
          <label class="custom-control-label" for="credit">Credit card</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
          <label class="custom-control-label" for="debit">Debit card</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
          <label class="custom-control-label" for="paypal">PayPal</label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="cc-name">Name on card</label>
          <input type="text" class="form-control" id="cc-name" placeholder="" required="">
          <small class="text-muted">Full name as displayed on card</small>
          <div class="invalid-feedback">
            Name on card is required
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="cc-number">Credit card number</label>
          <input type="text" class="form-control" id="cc-number" placeholder="" required="">
          <div class="invalid-feedback">
            Credit card number is required
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="cc-expiration">Expiration</label>
          <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
          <div class="invalid-feedback">
            Expiration date required
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <label for="cc-cvv">CVV</label>
          <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
          <div class="invalid-feedback">
            Security code required
          </div>
        </div>
      </div>
      <hr class="mb-4">
      <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
    </form>
  </div>
</div>
-->
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">© 2019-2020 Medunit</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </body>
</html>
