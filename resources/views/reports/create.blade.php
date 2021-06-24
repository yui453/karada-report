@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{!! link_to_route('users.index', '会員一覧',) !!}</li>
                <li class="breadcrumb-item"><a href = "{{ route('users.show', ['user'=>$user->id]) }}">No.{{$user->number}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">からだレポート新規作成ページ</li>
            </ol>
        </nav>
    
    <h3>{{ $user->name }}様のからだレポート作成</h3>
    
    {!! Form::model($report,['route' => ['reports.store', $user_id]]) !!}
    
        <div class="form-group">
            {!! Form::label('date', '来院日') !!}
            {!! Form::date('date', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('first_condition', '症状１') !!}
            {!! Form::text('first_condition', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('first_content', '患部の状態と施術内容') !!}
            {!! Form::textarea('first_content', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('second_condition', '症状２') !!}
            {!! Form::text('second_condition', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('second_content', '患部の状態と施術内容') !!}
            {!! Form::textarea('second_content', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('full_body', '体全体の状態') !!}
            {!! Form::textarea('full_body', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('selfcare', 'セルフケアアドバイス') !!}
            {!! Form::textarea('selfcare', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="text-center">
            {!! Form::submit('新規作成', ['class' => 'btn btn-lg mb-3']) !!}
        </div>
    {!! Form::close() !!}
    
@endsection