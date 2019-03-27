@if (session('success'))
<script type="text/javascript">
	toastr.success("{{ session('success')  }}", '', {positionClass: "toast-top-center"});
</script>
@endif

@if (session('error'))
<script type="text/javascript">
	toastr.error("{{ session('error')  }}", '', {positionClass: "toast-top-center"});
</script>
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
<script type="text/javascript">
	toastr.warning("{{ $error }}", '', {positionClass: "toast-top-center"});
</script>
@endforeach
@endif

<style type="text/css">.toast, .toast-top-center {
	margin-top: 35px;
}</style>