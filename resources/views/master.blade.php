<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="/css/ripples.min.css">
</head>
<body>

	@include('shared.navbar')

	@yield('content')

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="/js/ripples.js"></script>
    <script src="/js/material.js"> </script>
    <script>
    $(document).ready(function() {
        $.material.init();
    });
    </script>
</body>
</html>
