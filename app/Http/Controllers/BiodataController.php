<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 
class BiodataController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	$data = DB::table('data')->get();
 
    	// mengirim data pegawai ke view index
    	return view('index',['data' => $data]);
 
    }


// method untuk menampilkan view form tambah pegawai
	public function tambah()
	{
	
		// memanggil view tambah
		return view('tambah');
	}

	// method untuk insert data ke table pegawai
public function store(Request $request)
	{
	// insert data ke table pegawai
	DB::table('data')->insert([
		'npm' => $request->npm,
		'nama' => $request->nama,
		'jurusan' => $request->jurusan,
		'prodi' => $request->prodi,
		'alamat' => $request->alamat
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/data');
 
	}
	// method untuk edit data pegawai
	public function edit($npm)
	{
	// mengambil data pegawai berdasarkan id yang dipilih
	$data = DB::table('data')->where('npm',$npm)->get();
	// passing data pegawai yang didapat ke view edit.blade.php
	return view('edit',['data' => $data]);
 
	}
	// update data pegawai
public function update(Request $request)
	{
	// update data pegawai
	DB::table('data')->where('npm',$request->npm)->update([
		'nama' => $request->nama,
		'jurusan' => $request->jurusan,
		'prodi' => $request->prodi,
		'alamat' => $request->alamat
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/data');
	}
	// method untuk hapus data pegawai
	public function hapus($npm)
	{
		// menghapus data pegawai berdasarkan id yang dipilih
		DB::table('data')->where('npm',$npm)->delete();
		
		// alihkan halaman ke halaman pegawai
		return redirect('/data');
	}
}