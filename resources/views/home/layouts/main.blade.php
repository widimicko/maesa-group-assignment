@push('head')
    <link href="{{ asset("library/flexstart/style.css") }}" rel="stylesheet">
@endpush

@extends('layouts.index')

@section('body')
  @include('home.layouts.navbar')

  @yield('content')

  @include('home.layouts.footer')
@endsection

@push('script')
    <script src="{{ asset('library/flexstart/script.js') }}"></script>
		<script src="{{ asset('js/palindrome.js') }}"></script>
		<script>
			const resultElement = document.getElementById('result')

			function showResult(status) {
				let message = ''

				if (status === 'success') {
					message = 'That was a Palindrome'
				} else {
					message = 'That was not a Palindrome'
				}

				resultElement.innerHTML = `
					<div class="alert alert-${status} alert-dismissible fade show" role="alert">
						${message}
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				`
			}

			function palindromeCheck() {
				event.preventDefault()

				const stringValue = document.getElementById('stringValue').value
				if (stringValue == '') return
				isPalindrome = checkPalindrome(stringValue)
				
				if (isPalindrome) {
					showResult('success')
				} else {
					showResult('danger')
				}
			}
		</script>
@endpush