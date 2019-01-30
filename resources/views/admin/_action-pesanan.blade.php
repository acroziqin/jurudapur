<div class="text-right d-flex justify-content-around ">
	@if(!$isdone)
	<a href="{{ $url_markasdone }}" class="btn-markasdone mx-1" data-order-number="{{ $order->order_number }}"><h3><i class="fa fa-check text-success"></i></h3></a>
	@endif
	<a href="{{ $url_show }}" class="btn-show mx-1" data-id="{{ $order->id }}"><h3><i class="fa fa-list text-primary"></i></h3></a>
	<a href="{{ $url_destroy }}" class="btn-delete mx-1" title="{{ $order->name }}"><h3><i class="fa fa-trash text-danger"></i></h3></a>
</div>