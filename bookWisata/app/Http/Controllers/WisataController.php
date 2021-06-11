<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
        return view('backend.wisata.index')->with('wisata', $wisata)->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['subtitle'] = 'Tambah Wisata';
        $this->param['top_button'] = route('wisata.index');

        return view('backend.wisata.create', $this->param);
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
            'nama_wisata'=>'required|min:6',
            'alamat_wisata'=>'required',
            'gambar_wisata'=>'required',
            'deskripsi_wisata'=>'required',
            'harga_wisata'=>'required',
            'tag'=>'required',
        ],
        [
            'required' => 'Harap isi :attribute',
            'alamat_wisata.required' => 'Isi Alamat', 
            'min' => 'Panjang karakter minimal 6',
        ],
        [
            'nama_wisata' => 'Nama wisata',
            'alamat_wisata' => 'Alamat wisata',
            'gambar_wisata' => 'Deskripsi wisata',
            'harga_wisata' => 'Harga',
            'tag' => 'Tanda'
        ]        
        );
        try{
            $data = array(
                'nama_wisata' => $request->get('nama_wisata'),
                'alamat_wisata' => $request->get('alamat_wisata'),
                'deskripsi_wisata' => $request->get('deskripsi_wisata'),
                'harga_wisata' => $request->get('harga_wisata'),
                'tag' => $request->get('tag'),
                'slug' => Str::slug($request->get('nama_wisata'))
            );
            $lastId = DB::table('wisata')->insertGetId($data, 'id_wisata');
            
            if($request->file('gambar_wisata') != null) {
                $folder = 'upload/wisata/'.$request->get('gambar_wisata');
                $file = $request->file('gambar_wisata');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if ($file->move($folder, $filename)) {
                    DB::table('wisata')->where('id_wisata', '=', $lastId)->update([
                        'gambar_wisata' => $folder.$filename
                    ]);
                }
            }

            return redirect('wisata')->withStatus('Berhasil menambah data');
        }
        catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->withError($e->getMessage());
        }
        catch(\Illuminate\Database\QueryException $e){
            return $e->getMessage();
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Wisata $wisata)
    {
        return view('backend.wisata.index',compact('wisata'));
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
    public function update(Request $request, $id_wisata)
    {
        $request->validate([

        ]);
        try{ 
            $foto = Wisata::where('id_wisata', $id_wisata)->first()->gambar_wisata;
            DB::table('wisata')->where('id_wisata', $id_wisata)->update([
            'nama_wisata' => $request->get('nama_wisata'),
            'alamat_wisata' => $request->get('alamat_wisata'),
            'deskripsi_wisata' => $request->get('deskripsi_wisata'),
            'harga_wisata' => $request->get('harga_wisata'),
            'tag' => $request->get('tag'),
            'slug' => Str::slug($request->get('nama_wisata'))
        ]);
            if($request->file('gambar_wisata') != null) {
                $folder = 'upload/wisata/'.$request->get('gambar_wisata');
                $file = $request->file('gambar_wisata');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        if ($file->move($folder, $filename)) {
                            DB::table('wisata')->where('id_wisata', '=', $id_wisata)->update([
                                'gambar_wisata' => $folder.$filename
                            ]);
                        }
                    }
                }
                
            }
            return redirect()->route('wisata.index')->with('Berhasil', 'Data Wisata berhasil Diubah');
        }
        catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->withError($e->getMessage());
        }
        catch(\Illuminate\Database\QueryException $e){
            return $e->getMessage();
            return redirect()->back()->withError($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisata  $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_wisata)
    {
        try{
            $foto = Wisata::where('id_wisata', $id_wisata)->first()->gambar_wisata;
            if($foto != null){
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        DB::table('wisata')->where('id_wisata', $id_wisata)->delete();
                    }
                }
            }
            return redirect()->route('wisata.index')->with('Berhasil', 'Data Wisata berhasil Dihapus');

        }
        catch(\Exception $e){
            return $e->getMessage();
            //return redirect()->back()->withError($e->getMessage());
        }
        catch(\Illuminate\Database\QueryException $e){
            return $e->getMessage();
            //return redirect()->back()->withError($e->getMessage());
        }
    }
}
