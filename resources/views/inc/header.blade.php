<header style="margin-bottom: 15px;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid container-lg">
            <a class="navbar-brand" href="{{ route('index') }}">{{__('Тестовый форум')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('users.home') }}">Моя
                                страница</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Темы
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('posts.index') }}">Список всех тем</a></li>
                                <li><a class="dropdown-item" href="{{ route('posts.create') }}">Создать новую тему</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('posts.auth-user') }}">Список моих тем</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @endauth
                <form class="d-flex ms-auto">
                    @guest
                        <a class="btn btn-outline-success me-2" type="button"
                           href="{{ route('register') }}">{{ __( 'Регистрация') }}</a>
                        <a class="btn btn-outline-success me-2" type="button"
                           href="{{ route('login') }}">{{ __( 'Вход') }}</a>
                    @endguest
                    @auth
                        <a class="btn btn-danger" type="button"
                           href="{{ route('users.logout') }}">{{ __( 'Выход') }}</a>
                    @endauth
                </form>
            </div>
        </div>
    </nav>
</header>
