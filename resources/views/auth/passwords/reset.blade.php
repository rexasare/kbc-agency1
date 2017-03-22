@extends('main')

@section('validation')
  <link rel="stylesheet" href="../../css/parsley.css">

@endsection

@section('content')
  <section>
		<div id="agileits-sign-in-page" class="sign-in-wrapper">
			<div class="agileinfo_signin">
			<h3>Reset Password Form</h3>
				<form action="{{ url('password/reset') }}" method="post" data-parsley-validate="">
          <input type="hidden" name="token" value="{{ $token }}">
          <input type="email" name="email" placeholder="Your Email" required="" value="{{old('email')}}">
          <input type="password" name="password" placeholder="Password" required="">
					<input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
          {!! csrf_field() !!}
					<input type="submit" value="Reset Password">
				</form>
			</div>
		</div>
	</section>
@endsection
