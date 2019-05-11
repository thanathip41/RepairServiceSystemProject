<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">

<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>
				<form  class="login-form" method="POST" action="{{ route('login') }}"> @csrf
  <div class="form-group">
	<label for="username" class="text-uppercase">{{ __('Username') }}</label>
	<input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" 
	name="username" value="{{ old('username') }}" required autofocus>
	@if ($errors->has('username'))
      <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('username') }}</strong></span>
   @endif
  </div>
  <div class="form-group">
	<label for="password" class="text-uppercase">{{ __('Password') }}</label>
	<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
	name="password" required>
	@if ($errors->has('password'))
<span class="invalid-feedback" role="alert">
   <strong>{{ $errors->first('password') }}</strong>
      </span> @endif
  </div>
    <div class="form-check">
    <button type="submit" class="btn btn-login float-left">Submit</button>
    <a class="btn btn-link" href="{{ route('register') }}"> Register here </a>
  </div>
  
</form>
<div class="copy-text">Created with <i class="fa fa-heart"></i> by Grafreez</div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
  </div>
    </div>
            </div>	   
		    
		</div>
	</div>
</div>
</section>
@endsection