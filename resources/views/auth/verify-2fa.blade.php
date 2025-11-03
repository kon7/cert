<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Vérification 2FA</title>
	<link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css') }}">
    <style>
      .auth-left-wrapper{  
          background-color: #0c1427;
      }
    </style>
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">
				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
								<div class="col-md-4 pr-md-0">
									<div class="auth-left-wrapper d-flex align-items-center justify-content-center p-3">
										<img src="{{ asset('assets/images/anssi.png') }}"
											 alt="Anssi"
											 class="img-fluid rounded-circle"
											 style="max-width:160px; height:auto; object-fit:contain;">
									</div>
								</div>
								<div class="col-md-8 pl-md-0">
									<div class="auth-form-wrapper px-4 py-5">
										<a href="#" class="noble-ui-logo logo-light d-block mb-2">CERT<span>BF</span></a>
										<h5 class="text-muted font-weight-normal mb-4">Vérification en deux étapes</h5>
										<p class="text-muted mb-4">Un code a été envoyé à votre adresse email.</p>
										
										<form action="{{ route('verify.2fa') }}" method="POST">
											@csrf
											<div class="form-group">
												<label for="two_factor_code">Code de vérification</label>
												<input type="text" name="two_factor_code" id="two_factor_code" class="form-control" required autofocus>
												@error('two_factor_code')
													<div class="text-danger small">{{ $message }}</div>
												@enderror
											</div>

											<div class="mt-3">
												<button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
													Vérifier
												</button>
											</div>
										</form>

										{{-- Optionnel: lien pour renvoyer le code --}}
									

									</div>
								</div>
							</div> <!-- row -->
						</div> <!-- card -->
					</div>
				</div> <!-- row auth-page -->
			</div>
		</div>
	</div>

	<script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('assets/js/template.js') }}"></script>
</body>
</html>
