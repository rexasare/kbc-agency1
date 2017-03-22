@extends('main')

@section('validation')
  <link rel="stylesheet" href="../../css/parsley.css">

@endsection

@section('content')
  <section>
		<div id="agileits-sign-in-page" class="sign-in-wrapper">
			<div class="agileinfo_signin">
			<h3>Sign In</h3>
				<form action="{{ route('login') }}" method="post" data-parsley-validate="">
          <input type="email" name="email" placeholder="Your Email" required="" value="{{ old('email') }}">
					<input type="password" name="password" placeholder="Password" required="">
          {!! csrf_field() !!}
					<input type="submit" value="Sign In">
          <div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="remember">Remember me</label>
            <div class="forgot">
							<a href="{{ url('password/reset') }}" >Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
        	<h6> Not a Member Yet? <a href="{{ route('register') }}">Sign Up Now</a> </h6>
			</div>
		</div>
	</section>
@endsection
