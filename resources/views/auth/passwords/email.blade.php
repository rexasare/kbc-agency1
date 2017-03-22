@extends('main')

@section('validation')
  <link rel="stylesheet" href="../../css/parsley.css">

@endsection

@section('content')
  <section>
		<div id="agileits-sign-in-page" class="sign-in-wrapper">
			<div class="agileinfo_signin">
			<h3>Forgot Password</h3>
				<form action="{{ url('password/email') }}" method="post" data-parsley-validate="">
          <input type="email" name="email" placeholder="Your Email" required="" value="{{old('email')}}">
          {!! csrf_field() !!}
					<input type="submit" value="Reset Password">
				</form>
			</div>
		</div>
	</section>
@endsection
