{{-- layouts/master.blade.php --}}
<!-- In head section -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



@if(auth()->check())
    @include('layouts.app')
@else
    @include('layouts.guest')
@endif