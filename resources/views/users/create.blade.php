@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>新規会員登録</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::model($user,['route' => 'users.store']) !!}
                <div class="form-group">
                    {!! Form::label('number', 'No.') !!}
                    {!! Form::text('number', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection