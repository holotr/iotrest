@extends('app.layout.frame_without_aside')

@section('content')

    <div class="wrapper text-center m-t">
        <div class="h3 m-b">开始</div>
        <span class="padder">
            <a target="_blank" href="{{ url('console') }}" class="btn btn-lg btn-default">OAuth控制台</a>
        </span>
        <span class="padder">
            <a target="_blank" href="{{ url('console/logs') }}" class="btn btn-lg btn-default">日志</a>
        </span>
    </div>

    <div class="wrapper text-center m-t">
        <div class="h3 m-b">功能</div>
        <span class="padder">
            <a target="_blank" href="{{ url('users') }}" class="btn btn-lg btn-default">用户</a>
        </span>
        <span class="padder">
            <a target="_blank" href="{{ url('sensors') }}" class="btn btn-lg btn-default">传感器</a>
        </span>
        <span class="padder">
            <a target="_blank" href="{{ url('sensors/new') }}" class="btn btn-lg btn-default">新建传感器</a>
        </span>
    </div>

@endsection
