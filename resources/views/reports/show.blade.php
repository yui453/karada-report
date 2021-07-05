@extends('layouts.app')

@section('content')
    
    @if(Auth::check() && Auth::user()->is_admin == '1')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{!! link_to_route('users.index', '会員一覧',) !!}</li>
                <li class="breadcrumb-item"><a href = "{{ route('users.show', ['user'=>$user->id]) }}">No.{{$user->number}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$report->date}}のからだレポート</li>
            </ol>
        </nav>
    @endif
    
    <div class="d-flex flex-row mb-3">
        <h3 class="mr-5">{{ $report->date }}のからだレポート</h3>
        @if(Auth::check() && Auth::user()->is_admin == '1')
        <div class="mr-3">
            {!! link_to_route('reports.edit', '編集', ['user_id'=>$user_id, 'report'=>$report], ['class' => 'btn btn-lg  mb-2']) !!}
        </div>
        <div>
            {!! Form::model($report, ['route' => ['reports.destroy', $user_id, $report], 'method' => 'delete']) !!}
            {!! Form::submit('削除', ['class' => 'btn btn-lg']) !!}
            {!! Form::close() !!}
        </div>
        @endif
    </div>
    <div class="report_contents">
        <h5>症状：{{ $report->first_condition }}</h5>
        <div class="border border-secondary rounded mb-2" style="padding:10px;">{{ $report->first_content }}</div>
        @if(isset($report->second_content))
            <h5>症状：{{ $report->second_condition }}</h5>
            <div class="border border-secondary rounded mb-2" style="padding:10px;">{{ $report->second_content }}</div>
        @endif
        <h5>体全体の状態</h5>
        <div class="border border-secondary rounded mb-2" style="padding:10px;">{{ $report->full_body }}</div>
        <h5>セルフケアアドバイス</h5>
        <div class="border border-secondary rounded mb-2" style="padding:10px;">{{ $report->selfcare }}</div>
    
        {!! link_to_route('users.show', 'からだレポート一覧へ戻る', ['user'=>$report->user_id], ['class' => 'btn mb-2']) !!}
    </div>

@endsection('content')

