@extends('layouts.index')
@section('content')  
<h3>Form Anggota</h3>
@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label for="">Nama Anggota</label>
    <input type="text" name="nama"  value="{{ old('nama') }}" class="form-control  @error('nama') is-invalid @enderror"/>
    @error('nama')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
        <label for="">Email Anggota</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"/>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
            <label for="">HP Anggota</label>
            <input type="text" name="hp" value="{{ old('hp') }}" class="form-control @error('hp') is-invalid @enderror"/>
            @error('hp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
                <label for="">Foto Anggota</label>
                <input type="file" name="foto"  value="{{ old('foto') }}" class="form-control @error('foto') is-invalid @enderror"/>
                @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
            <button type="reset" class="btn btn-warning" name="unproses">Batal</button>
</form>

@endsection