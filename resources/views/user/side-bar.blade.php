
<div class="px-md-2 px-0">
    <div class="hd-side box-shadow d-flex flex-column">
        <div class="head d-flex flex-column justify-content-center align-items-center">
            <input type="file" id="avatar-profile" hidden>
            <div class="avatar">
                <span>
                    {{ Auth::user()->surname[0] }}
                </span>
            </div>
            <div class="text">
                <h4>
                    @if (date('a')  == 'am')
                    Bonjour
                @else
                    Bonsoir
                @endif
                {{ strtok(Auth::user()->surname, '') }}
                </h4>
            </div>
        </div>
    
        <div class="d-flex flex-column">
            <a class="side-item @if(Route::is('user.profile')) active @endif" href="{{ route('user.profile') }}">
                Mes informations
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            <a class="side-item @if(Route::is('user.favorites')) active @endif" href="{{ route('user.favorites') }}">
                Mes favoris
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            @if (Auth::user()->shop)
            <a class="side-item creation" href="{{ route('shop.show') }}">
                Gérer ma boutique
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            @endif
            <a class="side-item @if(Route::is('user.update.password')) active @endif" href="{{ route('user.update.password') }}">
                Mot de passe
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            <span class="side-item" id="logout-btn" role="button">
                Se déconnecter
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </span>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" hidden>
                @csrf
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('logout-btn').addEventListener('click', function () {
        document.getElementById('logout-form').submit();
    });
</script>