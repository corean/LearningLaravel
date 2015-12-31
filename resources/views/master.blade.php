<html>
<head>
	<title>@yield('title')</title>

    <!-- Material Design fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Material Design -->
    <link href="/css/bootstrap-material-design.css" rel="stylesheet">
    <link href="/css/ripples.min.css" rel="stylesheet">

</head>
<body>

	@include('shared.navbar')

	@yield('content')

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/js/material.js"> </script>
    <script src="/js/ripples.js"></script>
    <script>
    $(document).ready(function() {
        $.material.init();
    });
    </script>
</body>
</html>
