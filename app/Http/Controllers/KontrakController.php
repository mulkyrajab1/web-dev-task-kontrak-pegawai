<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrak;
use Illuminate\Support\Facades\Validator;

class KontrakController extends Controller
{
    public function index()
    {
        $kontrak = Kontrak::all();
        return response()->json($kontrak, 200);
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(),[
        'id_pegawai' => 'required',
        'id_jabatan' => 'required',
        'kontrak' => 'required',
        'kontrak_awal' => 'required',
        'kontrak_akhir' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    $kontrak = new Kontrak([
        'id_pegawai' => $request->get('id_pegawai'),
        'id_jabatan' => $request->get('id_jabatan'),
        'kontrak' => $request->get('kontrak'),
        'kontrak_awal' => $request->get('kontrak_awal'),
        'kontrak_akhir' => $request->get('kontrak_akhir')
    ]);
    $kontrak->save();

    return response()->json(['message' => 'Data kontrak berhasil di tambahkan', 'data' => $kontrak], 201);
}


    public function show($id)
    {
        $kontrak = Kontrak::find($id);
        if (!$kontrak) {
            return response()->json(['message' => 'Kontrak not found'], 404);
        }

        return response()->json($kontrak, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pegawai' => 'required',
            'id_jabatan' => 'required',
            'kontrak' => 'required',
            'kontrak_awal' => 'required',
            'kontrak_akhir' => 'required',
        ]);


        $kontrak->id_pegawai = $request->get('id_pegawai');
        $kontrak->id_jabatan = $request->get('id_jabatan');
        $kontrak->kontrak = $request->get('kontrak');
        $kontrak->kontrak_awal = $request->get('kontrak_awal');
        $kontrak->kontrak_akhir = $request->get('kontrak_akhir');

        return response()->json(['message' => 'Jabatan berhasil di ubah.', 'data' => $kontrak]);
        
    }

    public function destroy($id)
    {
        $kontrak = Kontrak::find($id);
        if (!$kontrak) {
            return response()->json(['message' => 'Kontrak not found'], 404);
        }

        $kontrak->delete();

        return response()->json(['message' => 'Data kontrak berhasil dihapus'], 200);
    }
}
