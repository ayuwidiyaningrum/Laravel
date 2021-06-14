@php
$no = 1;
//array Scalar
$s1 = ['nama'=>'Fawwaz','nilai'=>90];
$s2 = ['nama'=>'Bedu','nilai'=>50];
$s3 = ['nama'=>'Siti','nilai'=>40];
$s4 = ['nama'=>'Deden','nilai'=>80];
$judul = ['No','Nama','Nilai','Keterangan'];
//array assoc
$siswa = [$s1, $s2, $s3, $s4];
@endphp
<h3 align="center">Daftar Nilai Siswa</h3>
<table border="1" align="center" cellpadding="10">
    <thead>
    <tr bgcolor="pink">
        @foreach ($judul as $jdl)
        <th>{{ $jdl }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($siswa as $sis) 
            {{-- logic kelulusan dgn ternary --}}  
            @php
                $ket = ($sis['nilai'] >= 60) ? 'Lulus' : 'Gagal';
                $warna = ($no % 2 == 0) ? 'grey' : 'yellow';
            @endphp
            <tr bgcolor="{{ $warna }}">
            <td>{{ $no++ }}</td>
            <td>{{ $sis['nama'] }}</td>
            <td>{{ $sis['nilai'] }}</td>
            <td>{{ $ket }}</td>
            </td>
            @endforeach
        </tbody>
  </table>