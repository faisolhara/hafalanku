<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Admin, Dashboard, Bootstrap" />
	<link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/images/logo.png') }}">
	<title>Hafalanku - @yield('title')</title>

  @section('stylesheets')
    @include('includes.stylesheets')
  @show
	<script src="{{ asset('libs/bower/breakpoints.js/dist/breakpoints.min.js') }}"></script>
	<script>
		Breakpoints();
	</script>
</head>
	
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->

@section('app-navbar')
  @include('includes.app-navbar')
@show

@section('app-sidebar')
  @include('includes.app-sidebar')
@show

<!-- APP MAIN ==========-->
<main id="app-main" class="app-main">
  <div class="wrap">
	<section class="app-content">
    @if (\Session::has('successMessage'))
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span>{{ \Session::get('successMessage') }}</span>
      </div>
    @endif

    @if (\Session::has('errorMessage'))
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span>{{ \Session::get('errorMessage') }}</span>
      </div>
    @endif

    @yield('content')
	</section><!-- #dash-content -->
</div><!-- .wrap -->
  <!-- APP FOOTER -->
  <div class="wrap p-t-0">
    <footer class="app-footer">
      <div class="clearfix">
        <div class="copyright pull-left">Copyright &copy; Hafalanku 2017</div>
      </div>
    </footer>
  </div>
  <!-- /#app-footer -->
</main>
<!--========== END app main -->

@section('scripts')
  @include('includes.scripts')
  <script type="text/javascript">
    setTimeout(function(){
        window.location = '{{ URL('/keluar') }}';
    }, 240 * 60 * 1000);
</script>
@show
</body>
</html>