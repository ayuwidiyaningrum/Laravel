@extends('layouts.index')
@section('content')
    @foreach ($ar_buku as $b)
    <div class="card" style="width: 18rem;">
            @php
            if(!empty($b->cover)){
            @endphp
                <img src="{{ asset('images')}}/{{ $b->cover }}" width="80%" class="card-img-top"/>
            @php
            }else {
            @endphp
                <img src="{{ asset('images')}}/no_image.jpg" width="80%" class="card-img-top"/>
            @php
            }
            @endphp 
                <div class="card-body">
                <h5 class="card-title">{{ $b->judul}}</h5>
                  <p class="card-text">
                      ISBN : {{ $b->isbn }} 
                      <br>Tahun Cetak : {{ $b->tahun_cetak }} 
                      <br>Stok : {{ $b->stok }} 
                      <br>Pengarang : {{ $b->nama }} 
                      <br>Penerbit : {{ $b->pen }} 
                      <br>Kategori : {{ $b->kat }} 
                  </p>
                  <a href="{{ url('/buku') }}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        @endforeach
@endsection
