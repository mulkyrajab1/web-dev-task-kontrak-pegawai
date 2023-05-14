<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return response()->json($pegawais);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama_pegawai' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'gaji' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $pegawai = new Pegawai();
        $pegawai->nip = $request->nip;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->email = $request->email;
        $pegawai->password = $request->password;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->gaji = $request->gaji;
        $pegawai->save();
        return response()->json($pegawai);
    }

    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        return response()->json($pegawai);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nama_pegawai' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'gaji' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $pegawai = Pegawai::find($id);
        $pegawai->nip = $request->nip;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->email = $request->email;
        $pegawai->password = $request->password;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->gaji = $request->gaji;
        $pegawai->save();
        return response()->json($pegawai);
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return response()->json(['message' => 'Pegawai deleted']);
    }
}
