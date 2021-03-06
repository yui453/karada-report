@extends('layouts.app')

@section('content')

        <div id="main_visual">
                <img class="main_visual_pc" src="/images/main_visual_pc.jpg">
                <img class="main_visual_sp" src="/images/main_visual_sp.jpg">
                <div class="main_visual_title text-center">
                        <p class="sub_title">治療院と患者さんがつながる！</p>
                        <h1><i class="far fa-clipboard fa-lg mr-2 ml-4"></i>からだレポート</h1>
                        <p class="lead">からだの分析結果や治療方針を知っていただき、<br>安心して施術を受けていただくための情報共有サイトです。</p>
                        
                        @if(Auth::check())
                                {!! link_to_route('users.show', 'Myページへ', ['user'=>Auth::user()->id], ['class' => 'btn btn-lg login_btn']) !!}
                
                        @elseif(! Auth::check())
                                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn']) !!}
        
                        @endif
                </div>
        </div>
        
        <footer class="text-center mt-3">
                <small>&copy; 2021 からだレポート</small>
        </footer>
    
@endsection