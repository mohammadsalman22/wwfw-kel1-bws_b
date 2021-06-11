<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $wisata = Wisata::latest()->paginate(5);
        $wisata = Wisata::all();
        // return $wisata;
        return view('backend.wisata.index')->with('wisata', $wisata)->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_wisata'=>'required',
            'alamat_wisata'=>'required',
            'gambar_wisata'=>'required',
            'deskripsi_wisata'=>'required',
            'harga_wisata'=>'required',
            'tag'=>'required',
        ]);

        try{
            if($request->file('gambar_wisata') != null) {
                $folder = 'upload/wisata/'.$request->get('gambar_wisata');
                $file = $request->file('gambar_wisata');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if ($file->move($folder, $filename)) {
                    $newWisata->gambar_wisata = $folder.'/'.$filename;
                }
            }
            $newWisata->save();
            return redirect('master/user')->withStatus('Berhasil menambah data');
        }
        catch(\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withError($e->getMessage());
        }
        //Wisata::create($request->all());

        //return redirect()->route('wisata.index')->with('Berhasil', 'Data Wisata berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata)
    {
        return view('wisata.show',compact('wisata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit($wisata)
    {
        $wisata = Wisata::where('id_wisata', $wisata)->first();
        return view('backend.wisata.edit',compact('wisata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([

        ]);

        $wisata->update($request->all());

        return redirect()->route('wisata.index')->with('Berhasil', 'Data Wisata berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wisata $wisata)
    {
        $wisata->delete();

        return redirect()->route('wisata.index')->with('Berhasil', 'Data Wisata berhasil Dihapus');
    }
}
