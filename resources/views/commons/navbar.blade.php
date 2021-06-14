<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">からだレポート</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check() && Auth::user()->is_admin == '1')
                    {{-- 会員登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class'=>'nav-link']) !!}</li>
                    {{-- ログアウトリンク --}}
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class'=>'nav-link']) !!}</li>
                    
                @elseif(Auth::check())
                    {{-- ログアウトリンク --}}
                    <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class'=>'nav-link']) !!}</li>
                
                @else
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class'=>'nav-link']) !!}</li>
                
                @endif
                    
            </ul>
        </div>
    </nav>
</header>