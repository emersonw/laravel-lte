@if (session('success'))
<div class="alert alert-success">
	{{ session('success')  }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
	{{ session('error')  }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-warning">
	{{ $error }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endforeach
@endif