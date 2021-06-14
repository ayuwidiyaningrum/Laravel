@php
$nama = "Ayu Widiya Ningrum";
$nilai = 99.99;
@endphp
{{-- Struktur Kendali If --}}
@if($nilai >= 60) @php $ket = "Lulus"; @endphp
@else @php $ket = "Gagal"; @endphp
@endif

Nama Siswa : {{ $nama }}
<br/>Nilai : {{ $nilai }}
<br/>Keterangan : {{ $ket }}