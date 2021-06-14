@extends('layouts.index')
@section('content')  
<h3>Form Edit Pengarang</h3>
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@foreach ($data as $rs)
<form method="POST" action="{{ route('pengarang.update',$rs->id) }}" enctype="multipart/form-data">
@csrf
@method('put')
<div class="form-group">
    <label for="">Nama Pengarang</label>
    <input type="text" name="nama" value="{{ $rs->nama }} {{ old('nama') }}" class="form-control  @error('nama') is-invalid @enderror"/>
    @error('nama')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
        <label for="">Email Pengarang</label>
        <input type="text" name="email" value="{{ $rs->email }} {{ old('email') }}" class="form-control  @error('email') is-invalid @enderror"/>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
            <label for="">HP Pengarang</label>
            <input type="text" name="hp" value="{{ $rs->hp }} {{ old('hp') }}" class="form-control  @error('hp') is-invalid @enderror"/>
            @error('hp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
                <label for="">Foto Pengarang</label>
                <input type="file" name="foto" value="{{ $rs->foto }} {{ old('foto') }}" class="form-control  @error('foto') is-invalid @enderror"/>
                @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="proses">Ubah</button>
            <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
</form>
@endforeach
@endsection