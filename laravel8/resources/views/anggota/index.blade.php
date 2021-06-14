@extends('layouts.index')
@section('content')
@php    
$ar_judul = ['No','Nama','Email','Hp','Foto','Action'];
$no = 1;
@endphp
<h3>Daftar Anggota</h3>
<a class="btn btn-primary btn-md" href="{{ route('anggota.create') }}" role="button">Tambah</a>
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
        @foreach ($ar_anggota as $ang)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $ang->nama }}</td>
            <td>{{ $ang->email }}</td>
            <td>{{ $ang->hp }}</td>
            <td width="20%">
            @php
            if(!empty($ang->foto)){
            @endphp
                <img src="{{ asset('images')}}/{{ $ang->foto }}" width="80%" />
            @php
            }else {
            @endphp
                <img src="{{ asset('images')}}/no_image.jpg" width="80%" />
            @php
            }
            @endphp 
            </td>
            <td>
            <form method="POST" action="{{ route('anggota.destroy',$ang->id) }}">
                @csrf
                @method('delete')
                <a class="btn btn-info" href="{{ route('anggota.show',$ang->id) }}">Detail</a>
                <a class="btn btn-success" href="{{ route('anggota.edit',$ang->id) }}">Edit</a>
                <button class="btn btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection