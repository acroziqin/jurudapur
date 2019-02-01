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
				<h4 class="card-title">Daftar Dapur</h4>
			</div>
			<div class="card-body">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							<a href="{{ route('admin.dapur.create') }}" class="btn btn-success pull-right modal-show btn-add-dapur"
								style="margin-top: -8px;" title="Add Item"><i class="icon-plus"></i> Tambah Dapur</a>
						</h3>
					</div>
					<div class="panel-body">
						<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" scoped>
						<link href="{{ asset('vendor/datatables/datatables.min.css') }}" rel="stylesheet" scoped>
						<table id="datatable" class="table table-striped table-no-bordered dataTable dtr-inline"
							style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Deskripsi</th>
									<th>Kuota</th>
									<th>Kecamatan</th>
									<th>Foto</th>
									<th>Foto Header</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Deskripsi</th>
									<th>Kuota</th>
									<th>Kecamatan</th>
									<th>Foto</th>
									<th>Foto Header</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
						@include('admin._modal')
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
		let csrf_token = $('meta[name="csrf-token"]').attr('content');
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.dapur.data') }}",
            columns: [
                {data: 'DT_RowIndex',name: 'id', className: 'text-center'},
                {data: 'nama',name: 'nama'},
                {data: 'alamat',name: 'alamat'},
                {data: 'deskripsi',name: 'deskripsi'},
                {data: 'kuota',name: 'kuota', mRender: function(data){
					return data == null ? "0" : data;
				}},
				{data: 'lokasi',name: 'lokasi'},
                {data: 'foto',name: 'foto', mRender: function(data){
					return `<img class="img-thumbnail" src="/uploads/img/dapur/`+data+`" alt="">`;
				}},
                {data: 'foto_header',name: 'foto_header', mRender: function(data){
					return `<img class="img-thumbnail" src="/uploads/img/dapur/header/`+data+`" alt="">`;
				}},
                {data: 'action',name: 'action'}
            ]
        });
        $('body').on('click', '.btn-delete', function (event) {
            event.preventDefault();
            var me = $(this),
                url = me.attr('href'),
                title = me.attr('title');

            swal({
                title: 'Anda yakin untuk menghapus ' + title + ' ?',
                text: 'Anda tidak dapat mengurungkan tindakan ini.',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus saja'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            '_method': 'DELETE',
                            '_token': csrf_token
                        },
                        success: function (response) {
                            $('#datatable').DataTable().ajax.reload();
                            swal({
                                type: 'success',
                                title: 'Berhasil!',
                                text: 'Data telah terhapus!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        },
                        error: function (xhr) {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan!'
                            });
                        }
                    });
                }
            });
        });


        $('.sidebar-wrapper .nav-item:eq(3)').addClass('active');
    });
</script>
@endsection

