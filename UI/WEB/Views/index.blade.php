<html lang="it">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Youtube Api test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <div class="row">
            @if(session('message'))
                <div class="text-red">{{ session('message') }}</div>
            @endif

            @if(session('exception'))
                <div class="text-red">{{ session('exception') }}</div>
            @endif
            @if(isset($link))
                {!! $link !!}
            @endif
        </div>
    </div>
</div>
</body>
</html>
