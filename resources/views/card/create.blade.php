<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <form action="{{route('home.store')}}" method="POST">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h1>Добавить пациента</h1>
                        </div>
                        <form>
                          <div class="card-body">
                            <div class="form-group">
                              <legend for="name">Имя животного:</legend>
                              <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Имя животного">
                              @error('name')
                                  <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                            </div>
                            <div class="form-group">
                                <legend for="age">Возраст:</legend>
                                <input  type="text" type="text" name="age" class="form-control" id="formGroupExampleInput" placeholder="Возраст">
                            </div>
                            @error('age')
                                  <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                            <div class="form-group">
                                <legend for="reason_see">Причина посещения:</legend>
                                <input type="text" type="text" name="reason_see" class="form-control" id="formGroupExampleInput" placeholder="Причина посещения">
                            </div>
                            @error('reason_see')
                                  <div class="alert alert-danger">{{$message}}</div>
                              @enderror
                              <div class="form-group">
                                <legend for="assign">Назначение:</legend>
                                <textarea type="text" name="assign" class="form-control" id="formGroupExampleInput" placeholder="Назначение"></textarea>
                              </div>
                              @error('assign')
                              <div class="alert alert-danger">{{$message}}</div>
                          @enderror
                          </div>
                          <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Добавить</button>
                          </div>
                        </form>
                      </div>
                    <div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
