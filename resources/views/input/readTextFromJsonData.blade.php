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
              @foreach ($resultDatas as $key => $resultData)
                <table class="table">
                    <tr><th>基本信息项</th><th>值</th></tr>
                    @foreach ($resultData["commonData"] as $key => $commonData)
                        <tr>
                            <td>{{$key}}: </td>
                            <td>{{$commonData}}</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table">
                    <tr><th>检验项目</th><th>缩写</th><th>结果</th><th>趋势</th><th>参考值</th></tr>
                    @foreach ($resultData["valueData"] as $key => $valueData)
                        <tr>
                            <td>{{$valueData["label"]}}</td>
                            <td>{{$valueData["abb"]}}</td>
                            <td>{{$valueData["value"]}}</td>
                            <td>{{$valueData["towards"]}}</td>
                            <td>{{$valueData["referStart"]}} - {{$valueData["referEnd"]}} {{$valueData["unit"]}}</td>
                        </tr>
                    @endforeach
                </table>
                @endforeach
            </div>
        </div>
@endsection

@section('scripts')
    <script src="/js/input/input.js?v={{rand()}}"></script>
@endsection