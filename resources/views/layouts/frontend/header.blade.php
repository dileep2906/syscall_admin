@section('header')
<!doctype html>

<html lang="en">

    <head>

        <!-- Required meta tags -->

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.rtl.min.css") }}">

        <!-- Owl Carousel CSS -->

        <link rel="stylesheet" href="{{ asset("assets/css/owl.carousel.min.css") }}">

        <!-- Owl Carousel Theme Default CSS -->

        <link rel="stylesheet" href="{{ asset("assets/css/owl.theme.default.min.css") }}">

        <!-- Box Icon CSS-->

        <link rel="stylesheet" href="{{ asset("assets/css/boxicon.min.css") }}">

        <!-- Flaticon CSS-->

        <link rel="stylesheet" href="{{ asset("assets/fonts/flaticon/flaticon.css") }}">

        <!-- Meanmenu CSS -->

        <link rel="stylesheet" href="{{ asset("assets/css/meanmenu.css") }}">

        <!-- Style CSS -->

        <link rel="stylesheet" href="{{ asset("assets/css/style.css") }}">

		<!-- Dark CSS -->

        <link rel="stylesheet" href="{{ asset("assets/css/dark.css") }}">

		<!-- Responsive CSS -->

        <link rel="stylesheet" href="{{ asset("assets/css/responsive.css") }}">

		<!-- RTL CSS -->

        <link rel="stylesheet" href="{{ asset("assets/css/rtl.css") }}">

        <!-- Title CSS -->

        <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">

        <title>Shri HR</title>

        <!-- Favicon -->

        <link rel="icon" type="image/png" href="{{ asset("assets/img/sunrise-vector-art-18.png") }}">

	</head>



  	<body>







		<!-- Navbar Area Start -->

		<div class="navbar-area">

			<!-- Menu For Mobile Device -->

			<div class="mobile-nav">

				<a href="index.php" class="logo">

					<img src="assets/img/sunrise-vector-art-18.png" alt="logo"><h3 style="color: white;">Shri HR</h3>

				</a>

			</div>



			<!-- Menu For Desktop Device -->

			<div class="main-nav">

				<div class="container">

					<nav class="navbar navbar-expand-lg navbar-light">

						<a class="navbar-brand" href="index.php">

							<img src="assets/img/sunrise-vector-art-18.png" alt="logo"><h3>Shri HR</h3>

						</a>

						<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">

							<ul class="navbar-nav m-auto">

								<li class="nav-item">

									<a href="{{route('frontend')}}" class="nav-link">Home</a>

								</li>



								<li class="nav-item">

									<a href="{{ route('about')}}" class="nav-link">About Us</a>

								</li>

								<li class="nav-item dropdown ">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										HR SOLUTIONS
									</a>
									<ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
										<li><a class="dropdown-item" href="{{ route('hr-solutions') }}">Recruitment</a></li>
										<li><a class="dropdown-item" href="{{ route('staffing_solution') }}">Staffing Solutions</a></li>
									</ul>
								</li>

								<li class="nav-item dropdown ">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									SERVICES
									</a>
									<ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
										<li><a class="dropdown-item" href="{{ route('enquiry_fom') }}">Banking</a></li>
										<li><a class="dropdown-item" href="{{ route('enquiry_fom') }}">Insurance</a></li>
										<li><a class="dropdown-item" href="{{ route('enquiry_fom') }}">IT Services</a></li>
										<li><a class="dropdown-item" href="{{ route('enquiry_fom') }}">IT Staffing</a></li>
										<li><a class="dropdown-item" href="{{ route('enquiry_fom') }}">Logistics</a></li>
										
									</ul>
								</li>

                              <!--   <li class="nav-item">

									<a href="#" class="#">Active Job</a>

								</li> -->

                                <!-- <li class="nav-item">

									<a href="#" class="#">Become A Franchise</a>

								</li> -->

                                <li class="nav-item">
									<a href="apply-job" class="#">Apply For Job</a>
								</li>

								<li class="nav-item">

									<a href="{{route('contact')}}" class="nav-link">Contact Us</a>

								</li>





							</ul>





					</nav>

				</div>

			</div>

		</div>

		<!-- Navbar Area End -->
        @endsection
