<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    //

    public function data()
    {
        $edulevels = DB::table('edulevels')->get();
        
        //Metode passing data in laravel
        //return view('edulevels.data', ['edulevels' =>$edulevels]);
        return view('edulevels.data', compact('edulevels'));
        //return view('edulevels.data')->with('edulevels', $edulevels);
    }

    public function add()
    {
        return view('edulevels.add');
    }

    public function addProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ],[
            'name.required' => 'Nama jenjang tidak boleh kosong',
            'name.min' => 'Nama Jenjang minimal 2 karakter',
            'desc.required' => 'deskripsi harus diisi'
        ]);

        DB::table('edulevels')->insert([
            'name' => $request->name, 
            'desc' => $request->desc
        ]);
        return redirect('edulevels')->with('status', 'Jenjang berhasil ditambah!');
    }

    public function edit($id)
    {
        $edulevel = DB::table('edulevels')->where('id', $id)->first();

        return view('edulevels.edit', compact('edulevel'));
    }

    public function editProcess(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ],[
            'name.required' => 'Nama jenjang tidak boleh kosong',
            'name.min' => 'Nama Jenjang minimal 2 karakter',
            'desc.required' => 'deskripsi harus diisi'
        ]);

        DB::table('edulevels')
            ->where('id', $id)
            ->update([
                'name' => $request->name, 
                'desc' => $request->desc
            ]);
        return redirect('edulevels')->with('status', 'Jenjang berhasil diupdate!');
    }

    public function delete($id)
    {
        DB::table('edulevels')->where('id',$id)-> delete();
        return redirect('edulevels')->with('status', 'Jenjang berhasil dihapus!');
    }
}
