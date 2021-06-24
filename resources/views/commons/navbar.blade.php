<header class="mb-4">
    
    @if(Auth::check() && Auth::user()->is_admin == '1')
        <nav class="navbar navbar-expand-sm">
            <a href="{{ route('users.index') }}" class="navbar-brand"><i class="far fa-clipboard fa-lg mr-2 ml-4""></i>からだレポート</a>
    @elseif(Auth::check())
        <nav class="navbar navbar-expand-sm">
            <a href="{{ route('users.show', ['user'=>Auth::user()->id]) }}" class="navbar-brand"><i class="far fa-clipboard fa-lg mr-2 ml-4""></i>からだレポート</a>
    @else
        <nav class="navbar navbar-expand-sm">
            <a class="navbar-brand" href="/"><i class="far fa-clipboard fa-lg mr-2 ml-4""></i>からだレポート</a>
    @endif
        　
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check() && Auth::user()->is_admin == '1')
                    {{-- 会員登録ページへのリンク --}}
                    <li class="nav-item mr-4">{!! link_to_route('users.create', '会員登録', [], ['class'=>'nav-link']) !!}</li>
                    {{-- 会員一覧ページへのリンク --}}
                    <li class="nav-item mr-4">{!! link_to_route('users.index', '会員一覧', [], ['class'=>'nav-link']) !!}</li>
                    {{-- パスワード変更ページ --}}
                    <li class="nav-item mr-4">{!! link_to_route('password.form', 'パスワード変更', [], ['class'=>'nav-link']) !!}</li>
                    {{-- ログアウトリンク --}}
                <li class="nav-item mr-4">{!! link_to_route('logout.get', 'ログアウト', [], ['class'=>'nav-link']) !!}</li>
                    
                @elseif(Auth::check())
                    {{-- パスワード変更ページ --}}
                    <li class="nav-item mr-4">{!! link_to_route('password.form', 'パスワード変更', [], ['class'=>'nav-link']) !!}</li>
                    {{-- ログアウトリンク --}}
                    <li class="nav-item mr-4">{!! link_to_route('logout.get', 'ログアウト', [], ['class'=>'nav-link']) !!}</li>
                
                @else
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item mr-4">{!! link_to_route('login', 'ログイン', [], ['class'=>'nav-link']) !!}</li>
                
                @endif
                    
            </ul>
        </div>
    </nav>
</header>