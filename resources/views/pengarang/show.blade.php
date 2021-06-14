@extends('layouts.index')
@section('content')
      @foreach ($ar_pengarang as $p)
      <div class="card" style="width: 18rem;">
            @php
            if(!empty($p->foto)){
            @endphp
                <img src="{{ asset('images')}}/{{ $p->foto }}" width="80%" class="card-img-top"/>
            @php
            }else {
            @endphp
                <img src="{{ asset('images')}}/no_image.jpg" width="80%" class="card-img-top"/>
            @php
            }
            @endphp 
            <div class="card-body">
              <h5 class="card-title">{{ $p->nama }}</h5>
              <p class="card-text">
                    Email : {{ $p->email }}
                    <br/>HP : {{ $p->hp }}
              </p>
              <a href="{{ url('/pengarang') }}" class="btn btn-primary">Go Back</a>
            </div>
          </div>
          @endforeach
@endsection
