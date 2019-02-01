{!! Form::model($dapur, [
	'route' => $dapur->exists ? ['admin.dapur.update', $dapur->id] : 'admin.dapur.store',
	'method' => $dapur->exists ? 'PATCH' : "POST",
	'enctype' => "multipart/form-data",
]) !!}
<div class="form-group">
	<label for="" class="bmd-label-floating">Nama</label>
	{!! Form::text('nama', null, ['class'=>'form-control', 'id'=>'code'])!!}
</div>
<div class="form-group ">
	<label for="" class="bmd-label-floating">Alamat</label>
	{!! Form::text('alamat', null, ['class'=>'form-control', 'id'=>'name'])!!}
</div>
<div class="form-group ">
	<label for="" class="bmd-label-floating">Deskripsi</label>
	{!! Form::text('deskripsi', null, ['class'=>'form-control', 'id'=>'deskripsi'])!!}
</div>
<div class="form-group ">
	<label for="" class="bmd-label-floating">Kuota</label>
	{!! Form::number('kuota', null, ['class'=>'form-control', 'id'=>'kuota'])!!}
</div>
<div class="form-group ">
	<label for="" class="bmd-label-floating">Lokasi</label>
	{!! Form::text('lokasi', null, ['class'=>'form-control', 'id'=>'lokasi'])!!}
</div>
<div class="">
	<label for="" class="bmd-label-floating">Foto</label>
	<br>
	{!! Form::file('foto', ['id'=>'foto'])!!}
</div>
<br>
<div class="">
	<label for="" class="bmd-label-floating">Foto Header</label>
	<br>
	{!! Form::file('foto_header',['id'=>'foto_header'])!!}
</div>
{!! Form::submit($button,['class'=>'btn btn-success'])!!}
{!! Form::close() !!}