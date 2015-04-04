@extends('app')

@section('content')
<div id="da-slider" class="da-slider">
	<div class="mask"></div>

		<div class="container" style = "padding-top:100px;"> 
			<div style = "font-size:2em; color:#4C2952;"><b>Login</b></div>
			<hr style="width:inherit;"
				<div class="row-fluid">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
			
					<form class="inline-form" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label" style = "font-size:1.1em;">E-Mail Address</label>
							<div class="col-md-6 col-lg-12">
								<input type="email" style = "padding: 5px 36px;" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" style = "font-size:1.1em;">Password</label>
							<div class="col-md-6">
								<input type="password" style = "padding: 5px 36px;" class="form-control" placeholder="Enter your password" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" style = "font-size:1.0em;"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group" >
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="button" style = "padding: 10px 12px;border:2px solid #FFFFFF; color:#FFFFFF;">Login</button>
																<a style = "color:#FFFFFF; font-size:0.8em; padding: 10px 55px; " href="{{ url('/password/email') }}">Forgot Your Password?</a>
							</div>					

						</div>
					</form>
				</div>
		</div>


</div>
@endsection
