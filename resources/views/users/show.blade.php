@extends('layouts.app')

@section('content')
    
    @if(Auth::check() && Auth::user()->is_admin == '1')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{!! link_to_route('users.index', '会員一覧',) !!}</li>
                <li class="breadcrumb-item active" aria-current="page">No.{{$user->number}}</li>
            </ol>
        </nav>
    @endif
    
    <div class="card mb-5">
        <div class="card-body">
            <h2 class="card-title">
                <span class="mr-2">No.{{$user->number}}</span>
                <span>{{ $user->name }}様</span>
            </h2>
            @if(count($reports)>0)
                <h5 class="card-text d-sm-flex flex-row">
                    <p class="mr-5">
                        <span class="mr-2">症状：{{$user->reports()->orderBy('date', 'desc')->first()->first_condition}}</span>
                        <span>{{$user->reports()->orderBy('date', 'desc')->first()->second_condition}}</span>
                    </p>
                    <p>最終来院日：{{$user->reports()->orderBy('date', 'desc')->first()->date}}</p>
                </h5>
            @endif
        </div>
    </div>
    
    <div class="d-flex flex-row mb-3">
        <h3 class="mr-5">からだレポート一覧</h3>
        @if(Auth::check() && Auth::user()->is_admin == '1')
        <div>
        {!! link_to_route('reports.create', 'からだレポート新規作成', ['user_id'=>$user->id], ['class' => 'btn mb-2']) !!}
        </div>
        @endif
    </div>
    
    @if(count($reports)>0)
        {{ $reports->links() }}
        <ul class="list-unstyled mb-5">
            @foreach($reports as $report)
                <li>{!! link_to_route('reports.show', $report->date, ['user_id'=>$user->id, 'report'=>$report->id], ['class'=>'a report-list-item']) !!}</li>
            @endforeach
        </ul>
    @else
        <p>からだレポートがまだ登録されていません</p>
    @endif
    
    
@endsection