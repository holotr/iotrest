@extends('angulr.auth.auth_base')

@section('content')
    <div class="wrapper text-center">
        <strong>重置密码</strong>
    </div>
    <form name="form" class="form-horizontal form-validation" role="form" method="POST" action="{{ route('password.email') }}">
        {!! csrf_field() !!}

        @if (!empty($errors))
            <div class="text-danger wrapper text-center">
                {{$errors->first()}}
            </div>
        @endif
        <div class="list-group list-group-sm">
            <div class="list-group-item">
                <input type="email" placeholder="Email" class="form-control no-border" name="email"
                       value="{{ old('email') }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">
            发送密码重置链接
        </button>

        <div class="wrapper"></div>

    </form>
@endsection
