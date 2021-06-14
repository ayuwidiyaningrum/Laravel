@extends('layouts.index')
@section('content')
@php    
$ar_judul = ['No','Nama','Email','Hp','Foto','Action'];
$no = 1;
@endphp
<h3>Daftar Pengarang</h3>
<a class="btn btn-primary btn-md" href="{{ route('pengarang.create') }}" role="button">Tambah</a>
<table class="table table-striped">
    <thead>
        <tr>
            @foreach ($ar_judul as $jdl)
                <th>{{ $jdl }}</th>
            @endforeach 
            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ar_pengarang as $p)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->hp }}</td>
            <td width="20%">
            @php
            if(!empty($p->foto)){
            @endphp
                <img src="{{ asset('images')}}/{{ $p->foto }}" width="80%" />
            @php
            }else {
            @endphp
                <img src="{{ asset('images')}}/no_image.jpg" width="80%" />
            @php
            }
            @endphp 
            </td>
            <td>
            <form method="POST" action="{{ route('pengarang.destroy',$p->id) }}">
                @csrf
                @method('delete')
                <a class="btn btn-info" href="{{ route('pengarang.show',$p->id) }}">Detail</a>
                <a class="btn btn-success" href="{{ route('pengarang.edit',$p->id) }}">Edit</a>
                <button class="btn btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection