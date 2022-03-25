<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ePayco</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style> .navbar{margin-bottom: 20px;} </style>
	<script type="text/javascript" src="https://checkout.epayco.co/checkout.js"></script>
</head>
<body>
<div class="container" style="padding:20px;">
	<div id="info"  params={{ $params ?? '' }}>{{ $params ?? '' }} </div>
  <div id="main-checkout"></div>
 <script src="{{ asset('js/app.js') }}" defer></script>
</div>
</body>
</html>
