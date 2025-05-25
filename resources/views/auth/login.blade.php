<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
        <meta name="description" content="Web Application Antrian for Bapenda Kota Padang" />
        <meta name="keywords" content="bapenda, kota padang, padang, bapenda kota padang, bapenda padang, antrian, antrian bapenda, antrian bapenda kota padang" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="Web Application Antrian for Bapenda Kota Padang" />
        <meta property="og:url" content="http://localhost:8000" />
        <meta property="og:site_name" content="Antrian Bapenda | Kota Padang" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <style>
            body {
                background-image: url('/assets/media/images/bg10.jpeg');
            }
        </style>
	</head>
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-lg-row-fluid">
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('assets/media/images/agency.png') }}" alt="" />
					</div>
				</div>
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
						<div class="w-md-400px">
							<form class="form w-100" id="kt_sign_in_form" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-11">
                                    @include('layouts._alert')
                                </div>
								<div class="text-center mb-11">
									<h1 class="text-dark fw-bolder mb-3">Sign In</h1>
									<div class="text-gray-500 fw-semibold fs-6">Enter your credentials</div>
								</div>
								<div class="fv-row mb-8">
									<input type="email" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
								<div class="fv-row mb-8">
									<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent @error('password') is-invalid @enderror" required />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>
                                <div class="fv-row mb-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
								<div class="d-grid mb-10">
									<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
										<span class="indicator-label">Sign In</span>
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
	</body>
</html>