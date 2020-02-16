<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Medunit</title>

        <!-- Fonts -->
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
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <!-- <a href="{{ url('/home') }}">Home</a> -->
                    @else
                        <!-- <a href="{{ route('login') }}">Login</a> -->

                        @if (Route::has('register'))
                            <!-- <a href="{{ route('register') }}">Register</a> -->
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">


                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                  </div>
                  <div class="col-6">

                    <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>


                <div class="col-6">
                    <label for="exampleFormControlTextarea1">OCR result</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    <button type="button" class="form-control btn-primary" id="convertBtn">Convert</button>
                </div>
                <div class="col-6">
                <form>
                <div class="form-group">
                    
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">OCR multiple select</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </form>
            </div>
            </div>
        </div>
    </body>
</html>
