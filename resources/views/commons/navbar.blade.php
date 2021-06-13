<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">からだレポート</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(auth()->check() && auth()->user()->is_admin == '1')
                    {{-- 会員登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class'=>'nav-link']) !!}</li>
                    {{-- ログアウトリンク --}}
                    <li class="nav-item"><a href="#" class="nav-link">ログアウト</a></li>
                    
                @elseif(auth()->check())
                    {{-- ログアウトリンク --}}
                    <li class="nav-item"><a href="#" class="nav-link">ログアウト</a></li>
                
                @else
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item"><a href="#" class="nav-link">ログイン</a></li>
                
                @endif
                    
            </ul>
        </div>
    </nav>
</header>