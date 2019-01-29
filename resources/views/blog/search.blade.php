@php
use Illuminate\Support\Facades\Input;
@endphp
@extends('layouts.master')

@section('title', 'Jurudapur')

@section('cssTambahan')

@endsection

@section('content')
<main class="container">
    <div class="card mb-4" style="border-radius: 0 0 20px 20px; overflow: hidden">
        <img src="{{ 'https://imagerouter.tokopedia.com/img/1920/shops-1/2018/11/12/24721293/24721293_7e980331-c975-47a7-9109-05101e5a8f5f.jpg' }}"
            alt="" class="img-header">
    </div>

    <div class="row">
        <div class="col-12 col-lg-2">
            <form id="form-search" action="{{ route('search') }}" method="get">
                <div>
                    <h3>Cari : </h3>
                    <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                        <label class="btn btn-primary {{ Input::get('type','menu') == 'menu' ? 'active' : '' }}">
                            <input type="radio" name="type" value="menu" id="option-menu" autocomplete="off" class="target" {{ Input::get('type','menu') == 'menu' ? 'checked' : '' }}> Menu
                        </label>
                        <label class="btn btn-primary {{ Input::get('type','menu') == 'dapur' ? 'active' : '' }}">
                            <input type="radio" name="type" value="dapur" id="option-dapur" autocomplete="off" class="target" {{ Input::get('type','menu') == 'dapur' ? 'checked' : '' }}> Dapur
                        </label>
                    </div>
                </div>
                <br>
                <div>
                    <h3>Filter</h3>
                    <div class="list-group">
                        <span class="list-group-item">
                            <input type="checkbox" name="filter_makanan" id="filter_makanan" class="target"
                                {{ strpos(Input::get('filter',''), 'makanan') !== false ? 'checked' : '' }} value="makanan">
                                {!! Form::label('filter_makanan', 'Makanan') !!}
                            </span>
                            <span class="list-group-item">
                                <input type="checkbox" name="filter_minuman" id="filter_minuman" class="target"
                                {{ strpos(Input::get('filter',''), 'minuman') !== false ? 'checked' : '' }} value="minuman">
                                {!! Form::label('filter_minuman', 'Minuman') !!}
                            </span>
                            <span class="list-group-item">
                                <input type="checkbox" name="filter_kue" id="filter_kue" class="target"
                                {{ strpos(Input::get('filter',''), 'kue') !== false ? 'checked' : '' }} value="kue">
                                {!! Form::label('filter_kue', 'Kue') !!}
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-lg-10">
            @if (sizeOf($result) != 0)
                <div class="d-inline">
                    <span>Hasil pencarian {{ Input::get('type','menu') }}: </span><strong class="text-primary">{{ Input::get('query', '') }}</strong>
                </div>
            @endif
            <div class="menu d-flex justify-content-content-around" style="flex-wrap: wrap">
                @if (sizeOf($result) != 0)
                    @if ($searchAsMenu)
                        @foreach ($result as $item)
                        <a href="/product/{{$item['tipe']}}/{{$item['id']}}/detail" class="menu-item">
                            <div>
                                <img class="img lazyload" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                                    alt="">
                                <div class="content">
                                    <div class="title">{{ $item['nama'] }}</div>
                                    <div class="desc">
                                        <div>{{ $item['jenis'] }}</div>
                                    </div>
                                    {{-- <div class="price ori">{{ $makan->jenis }}</div> --}}
                                    <div class="price dis">Rp. {{ number_format($item['harga'], 0, ",", ".") }}
                                        <div class="ket"> / Pax</div>
                                    </div>
                                    <div class="kitchen"><i class="far fa-star"></i> B</div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                        @foreach ($result as $dapur)
                        <a href="/dapur/{{strtolower(str_replace(' ','-',$dapur['nama']))}}" class="menu-item">
                            <div>
                                <img class="img lazyload" src="https://placehold.it/200x150&text=1" data-src="https://craftlog.com/m/i/1939076=s1280=h960"
                                    alt="">
                                <div class="content">
                                    <div class="title">{{ $dapur['nama'] }}</div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @endif
                @else
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Hasil pencarian tidak ditemukan</h4>
                        <p>Tidak ditemukan hasil pencarian dengan keyword <b>{{ Input::get('query') }}</b></p>
                        <hr>
                        <p class="mb-0">Coba dengan keyword yang lain</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection

@section('jsTambahan')
<!-- Optional script -->
<script src="{{ asset('js/jquery.lazy.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.lazyload').lazy();

        $('#form-search').submit(function(event){
            let filterMakanan = $('#filter_makanan');
            let filterMinuman = $('#filter_minuman');
            let filterKue = $('#filter_kue');
            let filterValue = '';

            $('<input>').attr({
                type: 'hidden',
                name: 'query',
                value: '{{ Input::get("query") }}'
            }).appendTo(this);

            if(filterMakanan.prop('checked'))
                filterValue += filterMakanan.val()+','
            if(filterMinuman.prop('checked'))
                filterValue += filterMinuman.val()+','
            if(filterKue.prop('checked'))
                filterValue += filterKue.val()+','
            
            if(filterValue != ''){
                $('<input>').attr({
                    type: 'hidden',
                    name: 'filter',
                    value: filterValue
                }).appendTo(this);
            }

            // filterMakanan.remove();
            // filterMinuman.remove();
            // filterKue.remove();
        });
        $('.target').change(function(){
            $('#form-search').submit();
        });
    });

</script>
@endsection
