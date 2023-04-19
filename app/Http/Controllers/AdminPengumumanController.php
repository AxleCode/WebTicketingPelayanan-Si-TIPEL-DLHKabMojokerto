<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use Illuminate\Support\Str;

class AdminPengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumumans = Pengumuman::paginate(10);
        // foreach ($pengumumans as $pengumuman) {
        //     $pengumuman->judul = Str::limit($pengumuman->judul, 50);
        // }

        return view('dashboard.pengumuman.index', compact('pengumumans'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'body' => 'required',
            'status' => 'required'
        ]);
        
        Pengumuman::create($validateData);

        toast('Pengumuman telah ditambahkan','success')->autoClose(5000)->width('320px');

        return redirect('dashboard/pengumuman');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('dashboard.pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('dashboard.pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $rules = [
            'judul' => 'required|max:255',
            'body' => 'required',
            'status' => 'required'
        ];
        $validateData = $request->validate($rules);

        Pengumuman::where('id', $pengumuman->id)->update($validateData);
        toast('Pengumuman telah diupdate','success')->autoClose(5000)->width('320px');

        return redirect('dashboard/pengumuman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Pengumuman $pengumuman)
    {
        Pengumuman::destroy($pengumuman->id);
        toast('Pengumuman telah dihapus','success')->autoClose(5000)->width('320px');
        return redirect('/dashboard/pengumuman');
    }
}