@section('links')
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./resources/css/app.css"/>
@endsection

@section('foot')
    <div style="background-color:#06845b; min-width:100%; min-height:40px; position: fixed; bottom: 0px; display:flex; align-items:center; justify-content: center">
        <p>@VOG Linz {{date('Y')}}</p>
    </div>
@endsection

@section('header')
<head>
    @yield('links')
    <title>uploadFile</title>
</head>
@endsection



