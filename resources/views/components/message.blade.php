@if( session('message') != null)
<div class="text-danger">{{ session('message') }}</div>
@endif
@if( session('success' ))
<div class="alert alert-success text-white" role="alert">
    {{ session('success') }}
</div>
@endif