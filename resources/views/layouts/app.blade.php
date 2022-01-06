<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-7 p-2">
                <h1 @if(Request::is('/'))class="text-warning"@endif>
                     @if(!Request::is('/'))<a href="{{ route('home') }}" class="text-warning">@endif
                        News rbc
                    @if(Request::is('/'))</a>@endif
                </h1>
                @if(Request::is('/'))
                <small class="text-muted">Всего новостей: @yield('count-news')</small>
                @endif
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-7 p-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row @yield('class_row')">
            @if(Request::is('/'))
            <div class="col-3">
                @include('includes.message')
                @include('includes.form')
            </div>
            @endif
            @yield('content')
        </div>
        
    </div>
</body>
</html>