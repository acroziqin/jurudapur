@extends('admin.master')
@section('title', 'Daftar Pesanan | Admin JuruDapur')
@section('subtitle', 'Daftar Pesanan')
@push('style')
	
@endpush
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-primary card-header-icon">
				<div class="card-icon">
					<i class="material-icons">assignment</i>
				</div>
				<h4 class="card-title">Dapur</h4>
			</div>
			<div class="card-body">
				<div class="panel panel-primary">
					<div class="panel-heading">
						
					</div>
					<div class="panel-body">
						<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" scoped>
						<link href="{{ asset('vendor/datatables/datatables.min.css') }}" rel="stylesheet" scoped>
						@include('admin._form_dapur')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
<script>
	$(document).ready(function () {
		

        $('.sidebar-wrapper .nav-item:eq(3)').addClass('active');
    });
</script>
@endsection

