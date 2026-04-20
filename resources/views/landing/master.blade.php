<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Hilux - Real Estate HTML Template</title>

	@include('landing.components.css')
</head>

<body data-spy="scroll" data-offset="80">

	<!-- PRELOADER -->
	<div class="preloader">
		<div class="status">
			<div class="status-mes"></div>
		</div>
	</div>

	<!-- NAVBAR -->
	@include('landing.partial.navbar')

	<!-- CONTENT -->
	@yield('content')

	<!-- FOOTER -->
	@include('landing.partial.footer')

	<!-- JS -->
	@include('landing.components.js')

</body>

</html>