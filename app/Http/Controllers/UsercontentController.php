<?php

namespace App\Http\Controllers;

use \DB;
use \App\Models\CustomerModel;
use Illuminate\Http\Request;

class UsercontentController extends Controller
{
    public function index()
    {
        $table = DB::table('customer')->join('nationality', 'customer.nationality', '=', 'nationality.nationality_id')->get();
        // dd($table);
        return view('customer.index', compact('table'));
    }
    public function create()
    {
        $negara = DB::table('nationality')->get();
        return view('customer.create', compact('negara'));
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $blog = CustomerModel::create([
            'cst_name'     => $request->cst_name,
            'cst_dob'     => $request->cst_dob,
            'nationality'   => $request->nationality
        ]);

        foreach ($request->fam_name as $key => $value) {
            $fam = DB::table('family')->insert([
                'cst_id' => $blog->cst_id,
                'fl_name'          => $value,
                'fl_dob'      => $request->fam_dob[$key]
            ]);
        }

        if ($blog) {
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $negara = DB::table('nationality')->get();
        $data = CustomerModel::where('cst_id', $id)->first();
        $keluarga = DB::table('family')->where('cst_id', $id)->get();
        //    dd($keluarga);
        return view('customer.edit', compact('negara', 'data', 'keluarga','id'));
    }

    public function update(Request $request, $id)
    {

        // dd($request);
        $data = CustomerModel::where('cst_id', $id)->update([
            'cst_name'     => $request->cst_name,
            'cst_dob'     => $request->cst_dob,
            'nationality'   => $request->nationality
        ]);
        // dd($data);
        $hapus_keluarga = DB::table('family')->where('cst_id', $id)->delete();
        foreach ($request->fam_name as $key => $value) {
            $fam = DB::table('family')->insert([
                'cst_id' => $id,
                'fl_name'          => $value,
                'fl_dob'      => $request->fam_dob[$key]
            ]);
        }

        if ($data) {
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function hapus($id)
    {
        $hapus_keluarga = DB::table('family')->where('cst_id', $id)->delete();
        $hapus_keluarga = CustomerModel::where('cst_id', $id)->delete();
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Hapus !']);
    }
}
