<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
	<div class="wrapper">
		@include('layouts.sidebars')
		<div class="main">
			@include('layouts.header')
			<main class="content">
				<div class="container-fluid p-0">
          @yield('main')
				</div>
			</main>
      @include('layouts.footer')
		</div>
	</div>
@include('layouts.script')
</body>
</html>