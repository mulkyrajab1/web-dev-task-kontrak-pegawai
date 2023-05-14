<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;
class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        return response()->json(['data' => $jabatan]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_jabatan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = $request->input('nama_jabatan');
        $jabatan->save();

        return response()->json(['message' => 'Berhasil menambahkan data jabatan.', 'data' => $jabatan]);
    }

    public function show($id)
    {
        $jabatan = Jabatan::find($id);
        if ($jabatan) {
            return response()->json(['data' => $jabatan]);
        } else {
            return response()->json(['message' => 'Jabatan not found.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required',
        ]);

        $jabatan = Jabatan::find($id);
        if ($jabatan) {
            $jabatan->nama_jabatan = $request->input('nama_jabatan');
            $jabatan->save();
            return response()->json(['message' => 'Jabatan berhasil di ubah.', 'data' => $jabatan]);
        } else {
            return response()->json(['message' => 'Jabatan not found.'], 404);
        }
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        if ($jabatan) {
            $jabatan->delete();
            return response()->json(['message' => 'berhasil menghapus data jabatan.']);
        } else {
            return response()->json(['message' => 'Jabatan not found.'], 404);
        }
    }
}
