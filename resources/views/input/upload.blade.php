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
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                  </div>
                  <div class="col-6">

                    <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="/js/input/input.js?v={{rand()}}"></script>
@endsection
