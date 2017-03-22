@extends('main')

@section('validation')
  <link rel="stylesheet" href="../../css/parsley.css">
@endsection


@section('content')
  <section>
		<div id="agileits-sign-in-page" class="sign-in-wrapper">
			<div class="agileinfo_signin">
			<h3>Sign Up</h3>
				<form action="{{ route('register') }}" method="post" data-parsley-validate="">

					<input type="text" name="name" placeholder="Your Name" required="" value="{{ old('name')}}">
					<input type="email" name="email" placeholder="Your Email" required="" value="{{old('email')}}">
					<input type="tel" name="tel_no" placeholder="Mobile" required="" data-parsley-type="digits" value="{{old('tel_no')}}">
					<input type="password" name="password" placeholder="Password" required="">
					<input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
          {!! csrf_field() !!}
					<input type="submit" value="Sign Up">

				</form>
			</div>
		</div>
	</section>
@endsection
