@extends('layouts.app')

@section('content')
 <div class='text-center'>
     {{-- サービス概要 --}}
     <h3></h3>
     <p>
         
     </p>
     @if(Auth::check() && Auth::user()->is_admin == '1')
        {{-- 会員登録リンク --}}
        {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
     @endif
     
 </div>

@endsection