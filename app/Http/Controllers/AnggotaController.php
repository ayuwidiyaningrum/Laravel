<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use DB;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //buat array untuk mendapatkan data Anggota
    {
        $ar_anggota = DB::table('anggota')->get();
        return view('anggota.index', compact('ar_anggota'));
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //arahkan ke halaman form input
         return view('anggota.form');
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
                'nama'=>'required|max:100',
                'email'=>'required',
                'hp'=>'required|numeric',
                'foto'=>'image|mimes:jpg,png|max:2048',

            ],
            [
                'nama.required'=>'Nama Wajib di Isi',
                'email.required'=>'Email Wajib di Isi',
                'hp.required'=>'Nomor HP Wajib di Isi',
                'hp.numeric'=>'Nomor HP Harus Berupa Angka',
                'foto.image'=>'Ekstensi File Harus: jpg, png',
                'foto.max'=>'Ukuran File Tidak Boleh Melebihi 1024 KB',
            ]
        );

          //proses upload foto
          if(!empty($request->foto)){
            $fileName = $request->nama.'.'.$request->foto->extension(); 
            $request->foto->move(public_path('images'),$fileName);
        }else{
            $fileName = '';
        }
        //proses form input untuk dimasukan kedalam db
        //1. tangkap request dari form input
        DB::table('anggota')->insert(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                // 'foto'=>$request->foto,
                'foto'=>$fileName,
            ]
            );
            //2. landing page
            return redirect('/anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail anggota
        $ar_anggota = DB::table('anggota')
        ->where('id','=', $id)->get();
        return view('anggota.show', compact('ar_anggota'));
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
        $data = DB::table('anggota')->where('id',$id)->get();
        return view('anggota/form_edit', compact('data'));
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
         //proses validasi data
         $validasi = $request->validate(
            [
                'nama'=>'required|max:100',
                'email'=>'required',
                'hp'=>'required|numeric',
                'foto'=>'image|mimes:jpg,png|max:2048',

            ],
            [
                'nama.required'=>'Nama Wajib di Isi',
                'email.required'=>'Email Wajib di Isi',
                'hp.required'=>'Nomor HP Wajib di Isi',
                'hp.numeric'=>'Nomor HP Harus Berupa Angka',
                'foto.image'=>'Ekstensi File Harus: jpg, png',
                'foto.max'=>'Ukuran File Tidak Boleh Melebihi 1024 KB',
            ]
        );

        //proses upload cover
        if(!empty($request->foto)){
            $fileName = $request->nama.'.'.$request->foto->extension();
            $request->foto->move(public_path('images'),$fileName);
        }else{
            $fileName = '';
        }
        //proses ubah/edit data lama
        //1. tangkap request dari form input
        DB::table('anggota')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
            ]
            );
            //2. landing page
            return redirect('/anggota'.'/'.$id);
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
        DB::table('anggota')->where('id',$id)->delete();
        //landing page ke hal anggota
        return redirect ('/anggota');
    }
}
