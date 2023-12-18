<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<p class="lead">
								Masuk ke akun Anda untuk melanjutkan
							</p>
						</div>
							@if(session()->has('message'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									{{ session('message') }}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							@endif
							@if(session()->has('error'))
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									{{ session('error') }}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							@endif
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="/login" method="post">
										@csrf
										<div class="mb-3">
											<label for="email" class="form-label">Email</label>
											<input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{old('email')}}" placeholder="Masukkan email Anda" />
											@error('email')
											<div class="invalid-feedback">
												{{$message}}
											</div>
											@enderror
										</div>
										<div class="mb-2">
											<label for="password" class="form-label">Password</label>
											<input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Masukkan kata kunci" />
											@error('password')
											<div class="invalid-feedback">
												{{$message}}
											</div>
											@enderror
										</div>
										{{-- <small>
											Belum punya akun? <a href="/register">Daftar?</a>
										</small> --}}
										<div class="d-flex justify-content-center">
											<div class="text-center mt-3 me-3">
												<a type="button" href="/" class="btn btn-lg btn-secondary">Kembali</a>
											</div>
											<div class="text-center mt-3">
												<button type="submit" class="btn btn-lg btn-primary">Masuk</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	@include('layouts.script')
</body>
</html>