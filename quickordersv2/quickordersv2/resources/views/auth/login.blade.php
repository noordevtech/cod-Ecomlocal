<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        
        <title>Wisoo | Login</title>
        <meta name="description" content="Latest updates and statistic charts"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>

                <link href="{{ asset('vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
                <link href="{{ asset('/demo/demo2/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
    </head>



    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

        
        
<div class="m-grid m-grid--hor m-grid--root m-page">
    
			
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url(https://keenthemes.com/metronic/preview/assets/app/media/img/bg/bg-1.jpg);">
	<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
		<div class="m-login__container">
			<div class="m-login__logo">
                <a href="/" class="m-brand__logo-wrapper">
                    <img alt="" src="{{ asset('/app/media/img/logo.png') }}">
                </a>
			</div>
			<div class="m-login__signin">
				<form class="m-login__form m-form" method="POST" action="/auth/login">
                    {!! csrf_field() !!}
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="email" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off">
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input m-login__form-input--last" type="password" name="password" id="password" placeholder="Password">
					</div>
					<div class="row m-login__form-sub">
						<div class="col m--align-left m-login__form-left">
							<label class="m-checkbox  m-checkbox--light">
							<input type="checkbox" name="remember"> Remember me
							<span></span>
							</label>
						</div>
					</div>
					<div class="m-login__form-action">
						<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary" type="submit">Sign In</button>
					</div>
				</form>
			</div>
		</div>	
	</div>
</div>				
		

</div>

                    <script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
                    <script src="{{ asset('assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
                            <script src="{{ asset('assets/snippets/custom/pages/user/login.js') }}" type="text/javascript"></script>
        
                    </body>
</html>
