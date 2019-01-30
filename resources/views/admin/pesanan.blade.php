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
				<h4 class="card-title">Daftar Pesanan</h4>
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
									<th>Nomor Pemesanan</th>
									<th>Nama</th>
									<th>Tipe</th>
									<th>Menu</th>
									<th>Dapur</th>
									<th>Kuantitas</th>
									<th>Tanggal Pesan</th>
									<th>Lokasi Pembayaran</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
							<tfoot>
								<tr>
									<th>No</th>
									<th>Nomor Pemesanan</th>
									<th>Nama</th>
									<th>Tipe</th>
									<th>Menu</th>
									<th>Dapur</th>
									<th>Kuantitas</th>
									<th>Tanggal Pesan</th>
									<th>Lokasi Pembayaran</th>
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
            ajax: "{{route('admin.pesanan.data') }}",
            columns: [
                {data: 'DT_RowIndex',name: 'id', className: 'text-center'},
                {data: 'order_number',name: 'order_number'},
                {data: 'user.name',name: 'user.name'},
                {data: 'menu.tipe',name: 'menu.tipe'},
                {data: 'menu.nama',name: 'menu.nama'},
				{data: 'dapur.nama',name: 'dapur.nama'},
                {data: 'quantity',name: 'quantity'},
                {data: 'delivery_date',name: 'delivery_date'},
                {data: 'payment_location',name: 'payment_location'},
                {data: 'action',name: 'action'}
            ]
        });
	
		$('body').on('click', '.btn-markasdone', function (event) {
			event.preventDefault();
			let me = $(this),
			orderNumber = me.attr('data-order-number'),
			url = me.attr('href');
			swal({
                title: 'Apakah Anda yakin ingin menandai ' + orderNumber + ' telah selesai?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            '_method': 'PATCH',
                            '_token': csrf_token
                        },
                        success: function (response) {
                            $('#datatable').DataTable().ajax.reload();
                            swal({
                                type: 'success',
                                title: 'Success!',
                                text: 'Data has been deleted!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        },
                        error: function (xhr) {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            });
                        }
                    });
                }
            });
		});
		$('body').on('click', '.btn-show', function (event) {
			event.preventDefault();

			let me = $(this),
				id = me.attr('data-id')
				url = me.attr('href');

			$.ajax({
				dataType : 'html',
				url : url,
				success : function(response){
					$('#modal').modal('show');
					$('#modal-title').text('Data Pemesanan');
					$('#modal-btn-save').addClass('d-none');
					$('#modal-body').html(response);
				},
				failed : function(error){
					swal({
						title: 'Error',
						text: 'Something error!',
						type: 'error'
					});
				}
			})
		});
        $('body').on('click', '.btn-delete', function (event) {
            event.preventDefault();
            var me = $(this),
                url = me.attr('href'),
                title = me.attr('title'),
				tipe = me.attr('tipe');

			if(tipe == 1){
				swal({
					title: 'You won\'t be able to delete Admin'
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


        $('.sidebar-wrapper .nav-item:eq(2)').addClass('active');
    });
</script>
@endsection

