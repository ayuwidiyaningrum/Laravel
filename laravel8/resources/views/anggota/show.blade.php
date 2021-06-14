@extends('layouts.index')
@section('content')
      @foreach ($ar_anggota as $ang)
      <div class="card" style="width: 18rem;">
            @php
            if(!empty($ang->foto)){
            @endphp
                <img src="{{ asset('images')}}/{{ $ang->foto }}" width="80%" class="card-img-top"/>
            @php
            }else {
            @endphp
                <img src="{{ asset('images')}}/no_image.jpg" width="80%" class="card-img-top"/>
            @php
            }
            @endphp 
            <div class="card-body">
              <h5 class="card-title">{{ $ang->nama }}</h5>
              <p class="card-text">
                    Email : {{ $ang->email }}
                    <br/>HP : {{ $ang->hp }}
              </p>
              <a href="{{ url('/anggota') }}" class="btn btn-primary">Go Back</a>
            </div>
          </div>
          @endforeach
@endsection
