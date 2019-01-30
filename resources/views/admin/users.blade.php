@extends('admin.master')
@section('title', 'Daftar Pengguna | Admin JuruDapur')
@section('subtitle', 'Daftar Pengguna')
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
				<h4 class="card-title">Daftar Pengguna</h4>
			</div>
			<div class="card-body">
				<div class="panel panel-primary">
					<div class="panel-heading">
						
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
									<th>Tipe</th>
									<th>Email</th>
									<th>Alamat</th>
									<th>No Hp</th>
									<th>Jenis Kelamin</th>
									<th>Bergabung Sejak</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Tipe</th>
									<th>Email</th>
									<th>Alamat</th>
									<th>No Hp</th>
									<th>Jenis Kelamin</th>
									<th>Bergabung Sejak</th>
									<th>Action</th>
								</tr>
							</tfoot>
						</table>
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
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.users.data') }}",
            columns: [
                {data: 'DT_RowIndex',name: 'id', className: 'text-center'},
                {data: 'name',name: 'name'},
                {data: 'tipe',name: 'tipe', mRender: function(data, type, full){
					if(data == '1')
						return 'Admin';
					else 
						return 'User';
				}},
                {data: 'email',name: 'email'},
                {data: 'alamat',name: 'alamat'},
                {data: 'no_hp',name: 'no_hp',},
                {data: 'jenis_kelamin',name: 'jenis_kelamin'},
                {data: 'created_at',name: 'created_at'},
                {data: 'action',name: 'action'}
            ]
        });
        $('body').on('click', '.btn-delete', function (event) {
            event.preventDefault();
            var me = $(this),
                url = me.attr('href'),
                title = me.attr('title'),
				tipe = me.attr('tipe'),
                csrf_token = $('meta[name="csrf-token"]').attr('content');

			if(tipe == 1){
				swal({
					title: 'Anda tidak dapat menghapus akun Admin'
				});
				return;
			}

            swal({
                title: 'Anda yakin untuk menghapus ' + title + ' ?',
                text: 'Anda tidak dapat mengurungkan tindakan ini.',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus saja!'
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
                                title: 'Sukses!',
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


        $('.sidebar-wrapper .nav-item:eq(1)').addClass('active');
    });
</script>
@endsection

