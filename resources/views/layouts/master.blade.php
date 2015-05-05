<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>@yield('title') - LegiPix</title>
        <meta name="description" content="@yield('description')">

        <!-- Appareils Mobiles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Style -->
        {!! Html::style('assets/css/style.css') !!}
        {!! Html::style('http://fonts.googleapis.com/css?family=Roboto:300,300italic,400,400italic,500,500italic|Roboto+Condensed:300') !!}
        {!! Html::style('assets/css/fontello.css') !!}
        <!--[if IE 7]>{!! Html::style('assets/css/fontello-ie7.css') !!}<![endif]-->
        <!--[if lt IE 9]>{!! Html::style('http://html5shiv.googlecode.com/svn/trunk/html5.js') !!}<![endif]-->

        <!-- Favicons -->
        <link rel="icon" type="image/png" href="{{ asset('assets/img/icon/favicon.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/img/icon/icon.png') }}">
        <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/icon/favicon.ico') }}" /><![endif]-->

        <!-- Modern UI -->
        <meta name="msapplication-TileColor" content="#148DD4">
        <meta name="msapplication-TileImage" content="{{ asset('assets/img/icon/pinned-favicon.png') }}">
        <meta name="application-name" content="LegiPix">
    </head>
    <body>
        <header>
            <div class="header__main" id="head-main">
                <div class="wrapper--main">
                    <a href="{!! route('index') !!}" data-version="Prototype 5.0" class="logo"></a>
                    <nav class="menu">
                        <menu class="menu__list">
                            <li class="menu__list__item">
                                <a href="{!! route('index') !!}" class="menu__list__link">
                                <i class="icon-fire icon--large"></i>News
                                </a>
                            </li>
                            <li class="menu__list__item">
                                <a href="{!! route('index') !!}" class="menu__list__link">
                                <i class="icon-forum icon--large"></i>Forum
                                </a>
                            </li>
                            <li class="menu__list__item">
                                <a href="{!! route('index') !!}" class="menu__list__link">
                                <i class="icon-rocket icon--large"></i>Communauté
                                </a>
                            </li>
                            <li class="menu__list__item">
                                <a href="{!! route('index') !!}" class="menu__list__link">
                                <i class="icon-pad icon--large"></i>Social Play
                                </a>
                            </li>
                        </menu>
                    </nav>
                    @if(Auth::check())
                    <img src="http://placehold.it/60x60&amp;text=A" class="auth-user__avatar">
                    <div class="auth-user" id="header-main-user">
                        <span class="auth-user__name">Bienvenue, {!! link_to_route('m.view', $title = Auth::user()->name, array(Auth::id(), Auth::user()->name), $attributes = array(), $secure = null) !!}</span>
                        <ul class="header__main__user-notification">
                            <li class="notification-item">
                                <a href="#"><i id="m-notification-forum" data-content="06" class="notification-item__icon icon--large icon-chat"></i></a>
                            </li>
                            <li class="notification-item">
                                <a href="#">
                                <i id="m-notification-messages" data-content="01" class="notification-item__icon icon--large icon-letter"></i>
                                </a>
                            </li>
                            <li class="notification-item">
                                <a href="#">
                                <i id="m-notification-membres" data-content="00" class="notification-item__icon icon--large icon-pad"></i>
                                </a>
                            </li>
                            <li class="notification-item">
                                <a href="#">
                                <i id="m-notification-membres" data-content="00" class="notification-item__icon icon--large icon-user"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    @else
                    <div class="auth-user--logged-out">
                        <a href="{!! action('Auth\AuthController@getLogin') !!}" id="modal-open">Connexion au site</a>
                    </div>
                    @endif
                </div>
            </div>
            <div class="header__second">
                <div class="wrapper">
                    <menu class="header__second__menu" id="header-second-menu">
                        <li class="header__second__menu-item">
                            <a href="{{ route('index', $parameters = array()) }}">Accueil</a>
                        </li>
                        <li class="header__second__menu-item">
                            <a href="{{ route('index', $parameters = array()) }}">News</a>
                        </li>
                        <li class="header__second__menu-item">
                            <a href="{{ url('index', $parameters = array(), $secure = null) }}">Forum</a>
                        </li>
                        <li class="header__second__menu-item">
                            <a href="{{ url('#', $parameters = array(), $secure = null) }}">Communauté</a>
                        </li>
                        <li class="header__second__menu-item">
                            <a href="{{ url('#', $parameters = array(), $secure = null) }}">Social Play</a>
                        </li>
                    </menu>
                    @if(Auth::check())
                    <div class="header__second__user" id="header-second-user">
                        <ul class="header__second__user-notification">
                            <li class="notification-item">
                                <a href="#"><i id="s-notification-forum" data-content="06" class="notification-item__icon icon-chat"></i></a>
                            </li>
                            <li class="notification-item">
                                <a href="#"><i id="s-notification-messages" data-content="01" class="notification-item__icon icon-letter"></i></a>
                            </li>
                            <li class="notification-item">
                                <a href="#"><i id="s-notification-membres" data-content="00" class="notification-item__icon icon-pad"></i></a>
                            </li>
                            <li class="notification-item">
                                <a href="#"><i id="s-notification-membres" data-content="00" class="notification-item__icon icon-user"></i></a>
                            </li>
                        </ul>
                        <span class="header__second__user-name">{{{ Auth::user()->username }}}</span>
                    </div>
                    @else
                    <div class="header__second__user" id="header-second-user">
                        <div class="auth-user--logged-out">
                            <a href="{!! action('Auth\AuthController@getLogin') !!}" id="modal-open">Connexion au site</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </header>
        <section class="wrapper container">
        @yield('content')
        </section>
        <footer class="wrapper">
            LegiPix est une communauté de joueurs multigaming ayant pour but de rassembler des membres francophones pour jouer à plusieurs.<br>

            Suivez les dernières actualités via <a href="{{ url('#', $parameters = array(), $secure = null) }}" class="footer__link" rel="nofollow" target="_blank"><i class="icon-rss"></i>RSS</a> et sur <a href="#" class="footer__link" rel="nofollow" target="_blank"><i class="icon-tweet"></i>Twitter</a> et <a href="{{ url('#', $parameters = array(), $secure = null) }}" class="footer__link" rel="nofollow" target="_blank"><i class="icon-facebook"></i>Facebook</a> et abonnez vous à notre chaîne <a href="{{ url('#', $parameters = array(), $secure = null) }}" class="footer__link" rel="nofollow" target="_blank"><i class="icon-youtube"></i>YouTube</a>.<br>

            Développement du site par Albartros, contribuez sur <a href="{{ url('https://github.com/Albartros/LegiPix-L5', $parameters = array(), $secure = null) }}" class="footer__link" rel="nofollow" target="_blank"><i class="icon-github"></i>GitHub</a>.

            @if(Auth::check() && Auth::user()->hasRole('owner'))
            <span class="no-smartphone">Accéder à l'onglet <a href="{!! route('admin_dashboard') !!}" class="footer__link" rel="nofollow"><i class="icon-locked"></i>Administration</a>.</span>
            @endif
        </footer>
        <div id="modal-mask" class="modal__mask"></div>

        @unless(Auth::check())
        <!-- Connexion -->
        <div id="modal" class="modal">
            <div id="modal-login" class="modal__container">
                <div class="modal__name">Connexion au site
                    <a href="#" id="modal-close">&#x2573;</a>
                </div>
                <div class="modal__content">
                <form role="form" method="POST" action="{{ url('/auth/login') }}" accept-charset="UTF-8">
                    <p class="modal__info">Utilisez vos identifiants pour vous connecter</p>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal__form__block">
                        <div class="modal__form__icon">
                            <i class="icon-letter"></i>
                        </div>
                        <div class="modal__field__input">
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Adresse e-mail" required>
                        </div>
                    </div>
                    <div class="modal__form__block">
                        <div class="modal__form__icon">
                            <i class="icon-key"></i>
                        </div>
                        <div class="modal__field__input">
                            <input type="password" name="password" placeholder="Mot de passe" required>
                        </div>
                    </div>
                    <div class="modal__field__remember">
                        <label for="remember">
                            <input type="hidden" name="remember" value="0">
                            <input type="checkbox" name="remember"> Se souvenir de moi
                        </label>
                    </div>
                    <div class="modal__field__links">
                        <i class="icon-question"></i>
                        <u>{!! link_to_route('index', 'Vous n\'avez pas encore de compte ?', $attributes = array(), $secure = null) !!}</u>
                        <br>
                        <i class="icon-question"></i>
                        <u><a href="{{ url('/password/email') }}">Mot de passe oublié ?</a></u>
                    </div>
                    <div class="modal__field__button">
                        <button tabindex="3" type="submit">Envoyer</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        @endunless
        <div class="bottom-banners">
            <div class="cookie-banner" id="cookie-banner">
                <div class="cookie-banner__close">&#x2573;</div>
                <span>En poursuivant votre navigation sur nos sites, vous acceptez l'utilisation de cookies, notamment à des fins d'authentification. <a target="_blank" rel="nofollow" href="http://www.allaboutcookies.org/fr/cookies/">En savoir plus</a></span>
            </div>
            <div class="browser-banner" id="browser-banner">
                <div class="browser-banner__close">&#10006;</div>
                <span>Votre navigateur semble périmé. Il peut contient des failles de sécurité et pourrait ne pas afficher certaines fonctionalités de ce site internet. <a target="_blank" rel="nofollow" href="http://outdatedbrowser.com/fr">En savoir plus</a></span>
            </div>
        </div>

        <!-- JavaScript -->
        {!! HTML::script('assets/js/main.js') !!}
        @yield('scripts')
    </body>
</html>
