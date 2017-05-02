@extends('angulr.auth.auth_base')

@section('content')
    <div class="wrapper text-center">
        <h3>立即注册</h3>
    </div>
    <form name="form" class="form-horizontal form-validation" role="form" method="POST" action="{{ url('/register') }}">
        {!! csrf_field() !!}
        @if (!empty($errors))
            <div class="text-danger wrapper text-center">
                {{$errors->first()}}
            </div>
        @endif
        <div class="list-group list-group-sm">
            <div class="list-group-item">
                <input type="text" placeholder="昵称" class="form-control no-border" name="name"
                       value="{{ old('name') }}" required autofocus>
            </div>
            <div class="list-group-item">
                <input type="email" placeholder="Email" class="form-control no-border" name="email"
                       value="{{ old('email') }}" required>
            </div>
            <div class="list-group-item">
                <input type="password" placeholder="密码" class="form-control no-border" name="password"
                       required>
            </div>
            <div class="list-group-item">
                <input type="password" placeholder="重复密码" class="form-control no-border"
                       name="password_confirmation"
                       required>
            </div>
        </div>
        <div class="m-b-md">
            <div class="checkbox m-t-none">
                <label class="i-checks">
                    <input type="checkbox" ng-model="agree" required><i></i> 同意 <a href>用户条款和政策</a>
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">
            立即注册
        </button>

        <div class="wrapper"></div>
        <div class="line line-dashed"></div>
        <p class="text-center">
            <small>已有账号?</small>
        </p>
        <a href="{{ url('/login') }}" class="btn btn-lg btn-default btn-block">马上登录</a>

    </form>
@endsection
