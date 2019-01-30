<div class="text-right d-flex justify-content-around ">
	<a href="{{ $url_show }}" class="btn-show mx-1" title="Detail: {{ $item->name }}"><h3><i class="fas fa-bars text-primary" ></i></h3></a>
	<a href="{{ $url_edit }}" class="modal-show edit mx-1" title="Edit {{ $item->name }}"><h3><i class="icon-pencil text-warning"></i></h3></a>
	<a href="{{ $url_destroy }}" class="btn-delete mx-1" title="{{ $item->name }}"><h3><i class="icon-trash text-danger"></i></h3></a>
</div>