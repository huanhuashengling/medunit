@extends('layouts.reportinput')

@section('content')
    <div class="container">
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
                <label for="exampleFormControlFile1">第一步：选择报告单上传</label>
                <input type="file" class="form-control-file" name="image" id="input-zh">
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-success">上传</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/report/upload.js?v={{rand()}}"></script>
@endsection
