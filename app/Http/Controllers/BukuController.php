<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Buku;
class BukuController extends Controller
{
    //fungsi index
    public function index(){

        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id', 'asc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $total_harga = DB::table('Buku')->sum('harga');
        return view('buku.index', compact('data_buku', 'no', 'jumlah_buku', 'total_harga'));

        
        // $no = 0;
        // $jumlah_data = DB::table('Buku')->count();
        // return view('buku.index', compact('data_buku', 'no', 'jumlah_data', 'total_harga'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ],
    
            [
                'judul.required' => 'Judul tidak boleh kosong',
                'penulis.required' => 'Penulis tidak boleh kosong',
                'penulis.max' => 'Penulis tidak boleh lebih dari 30 huruf',
                'harga.required' => 'Harga tidak boleh kosong',
                'harga.numeric' => 'Harga harus berupa angka',
                'tgl_terbit.required' => 'Tanggal terbit tidak boleh kosong'
            ]);

        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Simpan');

    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('hapus', 'Data berhasil dihapus');
    }

    public function tampilData($id){
        $buku = Buku::find($id);
        return view('buku.update', compact('buku'));
    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ],
    
            [
                'judul.required' => 'Judul tidak boleh kosong',
                'penulis.required' => 'Penulis tidak boleh kosong',
                'penulis.max' => 'Penulis tidak boleh lebih dari 30 huruf',
                'harga.required' => 'Harga tidak boleh kosong',
                'harga.numeric' => 'Harga harus berupa angka',
                'tgl_terbit.required' => 'Tanggal terbit tidak boleh kosong'
            ]);


        $buku = Buku::find($id);
        // $buku->update($request->all());
        $buku->judul = $request-> judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('update', 'Data berhasil diupdate');
        
    }

    public function search(Request $request){

        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->orwhere('penulis','like', "%".$cari."%")->paginate($batas);
        $jumlah_buku = Buku::count();
        $no = $batas * ($data_buku->currentPage() - 1);
        $total_harga = DB::table('Buku')->sum('harga');
        return view('buku.search', compact('data_buku', 'no', 'jumlah_buku', 'cari', 'total_harga'));

    }

}
