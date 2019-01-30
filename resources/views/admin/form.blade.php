{!! Form::model($item, [
	'route' => $item->exists ? ['store.item.update.post', $item->id] : 'store.item.store',
	'method' => 'POST',
	'enctype' => "multipart/form-data",
]) !!}

<div class="form-group">
	<label for="" class="bmd-label-floating">Code</label>
	{!! Form::text('code', null, ['class'=>'form-control', 'id'=>'code'])!!}
</div>
<div class="form-group ">
	<label for="" class="bmd-label-floating">Name</label>
	{!! Form::text('name', null, ['class'=>'form-control', 'id'=>'name'])!!}
</div>
<div class="form-group ">
	<label for="" class="bmd-label-floatingl">Buy Price per Item</label>
	{!! Form::number('buy_price', null, ['class'=>'form-control', 'id'=>'buy_price'])!!}
</div>
<div class="form-group ">
	<label for="" class="bmd-label-floating">Sell Price per Item</label>
	{!! Form::number('sell_price', null, ['class'=>'form-control', 'id'=>'sell_price'])!!}
</div>
	
<div class="form-check ">
	{!! Form::checkbox('with_stock', null, ['class'=>'form-check-input', 'id'=>'with_stock'])!!}
	<label for="" class="bmd-label-floatingla form-check-label">With Stock</label>
</div>
<div class="form-group ">
	<label for="" class="bmd-label-floatingl">Stock</label>
	{!! Form::number('stock', null, ['class'=>'form-control', 'id'=>'stock'])!!}
</div>
<div class="form-group ">
	<label for="" class="bmd-label-floatingl">Photo</label><br>
	{!! Form::file('photo', ['id'=>'photo', 'accept'=>'image/*'])!!}
</div>
<div id="progress-bar" class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height:3px;">
</div>
{!! Form::close() !!}