@extends('layouts.app')

@section('content')
   
    @if(auth()->check() && auth()->user()->is_admin == '1')
        <div class="d-flex flex-row mb-3">
            <h3 class="mr-5">会員一覧</h3>
            <div>
            {!! link_to_route('users.create', '新規会員登録', [], ['class' => 'btn']) !!}
            </div>
        </div>
    
        {{ $users->links() }}
        <table class="table">
            <tr>
                <th class="text-left" style="width:20%">会員番号</th>
                <th class="text-left" style="width:50%">氏名</th>
                <th style="width:30%"></th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td class="text-left">{{$user->number}}</td>
                <td class="text-left">{{ $user->name }}</td>
                <td class="text-left">{!! link_to_route('users.show', '詳細ページへ', ['user'=>$user->id], ['class'=>'btn index-link']) !!}</td>
            </tr>
            @endforeach
        </table>
    
    @else
        redirect('/')
    @endif

@endsection
