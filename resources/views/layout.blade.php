<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('seoDescription', 'My personal blog')">
    <meta name="author" content="Victor Istrati">
    <title>@yield('pageTitle', 'Acasa') - Zbor cu balonul in Moldova</title>
    <link rel="icon" href="https://getbootstrap.com/docs/5.1/assets/img/favicons/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    @include('header')
    <div class="row">
        <div class="col-lg-12">
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('footer')

</body>
</html>
