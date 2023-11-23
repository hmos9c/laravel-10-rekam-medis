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
								Daftar Akun
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="/register" method="post">
                    @csrf
										<div class="mb-3">
											<label for="name" class="form-label">Nama</label>
											<input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name')}}" autofocus placeholder="Masukkan nama Anda"/>
											@error('name')
											<div class="invalid-feedback">
												{{$message}}
											</div>
											@enderror
										</div>
										<div class="mb-3">
											<label for="email" class="form-label">Email</label>
											<input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" id="email" value="{{old('email')}}" placeholder="Masukkan email Anda"/>
											@error('email')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
										<div class="mb-2">
											<label for="password" class="form-label">Password</label>
											<input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Masukkan kata kunci"/>
											@error('password')
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
										<small>
											Sudah punya akun? <a href="/login">Masuk?</a>
										</small>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Daftar</button>
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

