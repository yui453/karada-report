@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>パスワード変更</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => ['password.change', ]]) !!}
                <div class="form-group">
                    {!! Form::label('current_password', '現在のパスワード') !!}
                    {!! Form::password('current_password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', '新しいパスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation', '新しいパスワード（確認）') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('変更', ['class' => 'btn btn-block']) !!}
            {!! Form::close() !!}

        </div>
    </div>
@endsection