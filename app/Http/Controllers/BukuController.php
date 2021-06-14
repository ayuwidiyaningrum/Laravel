<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB; //koneksinya
use App\Models\Buku;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_buku = DB::table('buku')
        ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
        ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
        ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
        ->select('buku.*', 'pengarang.nama', 'penerbit.nama AS pen','kategori.nama AS kat')
        ->get();
        return view('buku.index', compact('ar_buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //arahkan ke halaman form input
        return view('buku.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validasi = $request->validate(
            [
                'isbn'=>'required|unique:buku|max:100',
                'judul'=>'required',
                'tahun_cetak'=>'required|numeric',
                'stok'=>'required|numeric',
                'idpengarang'=>'required|numeric',
                'idpenerbit'=>'required|numeric',
                'idkategori'=>'required|numeric',
                'cover'=>'image|mimes:jpg,png|max:2048',

            ],
            [
                'isbn.required'=>'ISBN Wajib di Isi',
                'isbn.unique'=>'ISBN Tidak Boleh Sama',
                'judul.required'=>'Judul Buku Wajib di Isi',
                'tahun_cetak.required'=>'Tahun Cetak Wajib di Isi',
                'tahun_cetak.numeric'=>'Tahun Cetak Harus Berupa Angka',
                'stok.required'=>'Stok Wajib di Isi',
                'stok.numeric'=>'Stok Harus Berupa Angka',
                'idpengarang.required'=>'Pengarang Wajib di Isi',
                'idpenerbit.required'=>'Penerbit Wajib di Isi',
                'idkategori.required'=>'Kategori Buku Wajib di Isi',
                'cover.image'=>'Ekstensi File Harus: jpg, png',
                'cover.max'=>'Ukuran File Tidak Boleh Melebihi 1024 KB',
            ]
        );

         //proses upload cover
         if(!empty($request->cover)){
            $fileName = $request->isbn.'.'.$request->cover->extension();
            $request->cover->move(public_path('images'),$fileName);
        }else{
            $fileName = '';
        }
        //proses form input untuk dimasukan kedalam db
        //1. tangkap request dari form input
        DB::table('buku')->insert(
            [
                'isbn'=>$request->isbn,
                'judul'=>$request->judul,
                'tahun_cetak'=>$request->tahun_cetak,
                'stok'=>$request->stok,
                'idpengarang'=>$request->idpengarang,
                'idpenerbit'=>$request->idpenerbit,
                'idkategori'=>$request->idkategori,
                'cover'=>$fileName,
            ]
            );
            //2. landing page
            return redirect('/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //menampilkan detail buku
         $ar_buku = DB::table('buku')
         ->join('pengarang', 'pengarang.id', '=', 'buku.idpengarang')
         ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit')
         ->join('kategori', 'kategori.id', '=', 'buku.idkategori')
         ->select('buku.*', 'pengarang.nama', 'penerbit.nama AS pen','kategori.nama AS kat')
         ->where('buku.id','=', $id)
         ->get();
         return view('buku.show', compact('ar_buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //mengarahkan ke halaman form edit data
         $data = DB::table('buku')
         ->where('id', '=', $id)
         ->get();
         return view('buku.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //proses upload cover
        if(!empty($request->cover)){
            $fileName = $request->isbn.'.'.$request->cover->extension();
            $request->cover->move(public_path('images'),$fileName);
        }else{
            $fileName = '';
        }
        //proses ubah/edit data lama
        //1. tangkap request dari form input
        DB::table('buku')->where('id','=',$id)->update(
            [
                'isbn'=>$request->isbn,
                'judul'=>$request->judul,
                'tahun_cetak'=>$request->tahun_cetak,
                'stok'=>$request->stok,
                'idpengarang'=>$request->idpengarang,
                'idpenerbit'=>$request->idpenerbit,
                'idkategori'=>$request->idkategori,
            ]
            );
            // 2. landing page
            return redirect('/buku'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          //menghapus data
          DB::table('buku')->where('id',$id)->delete();
          //landing page ke hal pengarang
          return redirect ('/buku');
    }
}
