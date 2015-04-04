@extends('app')

@section('content')
<div id="da-slider" class="da-slider">
	<div class="mask"></div>
		<div class="container" style = "padding-top:100px;"> 
			<div style = "font-size:2em; color:#4C2952;"><b>Register</b></div>
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

					<form class="inline-form" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" style = "padding: 5px 36px;" class="form-control" name="name" value="{{ old('name') }}" placeholder="Example: Abdelrahman Sakr">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" style = "padding: 5px 36px;" class="form-control" name="email" value="{{ old('email') }}" placeholder="Example: yourmail@example.com">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" style = "padding: 5px 36px;" class="form-control" name="password" placeholder="At least 6 characters">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" style = "padding: 5px 36px;" class="form-control" name="password_confirmation" placeholder="Just a re-check ;)">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" style = "padding: 10px 12px;border:2px solid #FFFFFF; color:#FFFFFF;" class="button">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
