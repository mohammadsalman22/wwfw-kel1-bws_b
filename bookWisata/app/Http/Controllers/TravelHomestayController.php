<?php

namespace App\Http\Controllers;

use App\Models\TravelHomestay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TravelHomestayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travel_homestay = TravelHomestay::all();
        return view('backend.travel_homestay.index')->with('travel_homestay', $travel_homestay)->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['subtitle'] = 'Tambah TravelHomestay';
        $this->param['top_button'] = route('travel_homestay.index');

        return view('backend.travel_homestay.create', $this->param);
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
            'nama_travel_homestay'=>'required|min:6',
            'alamat_travel_homestay'=>'required',
            'gambar_travel_homestay'=>'required',
            'deskripsi_travel_homestay'=>'required',
            'harga_travel_homestay'=>'required',
            'tag'=>'required',
        ],
        [
            'required' => 'Harap isi :attribute',
            'alamat_travel_homestay.required' => 'Isi Alamat', 
            'min' => 'Panjang karakter minimal 6',
        ],
        [
            'nama_travel_homestay' => 'Nama travel_homestay',
            'alamat_travel_homestay' => 'Alamat travel_homestay',
            'gambar_travel_homestay' => 'Deskripsi travel_homestay',
            'harga_travel_homestay' => 'Harga',
            'tag' => 'Tanda'
        ]        
        );
        try{
            $data = array(
                'nama_travel_homestay' => $request->get('nama_travel_homestay'),
                'alamat_travel_homestay' => $request->get('alamat_travel_homestay'),
                'deskripsi_travel_homestay' => $request->get('deskripsi_travel_homestay'),
                'harga_travel_homestay' => $request->get('harga_travel_homestay'),
                'tag' => $request->get('tag'),
                'slug' => Str::slug($request->get('nama_travel_homestay'))
            );
            $lastId = DB::table('travel_homestay')->insertGetId($data, 'id_travel_homestay');
            
            if($request->file('gambar_travel_homestay') != null) {
                $folder = 'upload/travel_homestay/'.$request->get('gambar_travel_homestay');
                $file = $request->file('gambar_travel_homestay');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if ($file->move($folder, $filename)) {
                    DB::table('travel_homestay')->where('id_travel_homestay', '=', $lastId)->update([
                        'gambar_travel_homestay' => $folder.$filename
                    ]);
                }
            }

            return redirect('travel_homestay')->withStatus('Berhasil menambah data');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TravelHomestay $travel_homestay)
    {
        return view('backend.travel_homestay.index',compact('travel_homestay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($travel_homestay)
    {
        $travel_homestay = TravelHomestay::where('id_travel_homestay', $travel_homestay)->first();
        return view('backend.travel_homestay.edit',compact('travel_homestay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_travel_homestay)
    {
        $request->validate([

            ]);
            try{ 
                $foto = TravelHomestay::where('id_travel_homestay', $id_travel_homestay)->first()->gambar_travel_homestay;
                DB::table('travel_homestay')->where('id_travel_homestay', $id_travel_homestay)->update([
                'nama_travel_homestay' => $request->get('nama_travel_homestay'),
                'alamat_travel_homestay' => $request->get('alamat_travel_homestay'),
                'deskripsi_travel_homestay' => $request->get('deskripsi_travel_homestay'),
                'harga_travel_homestay' => $request->get('harga_travel_homestay'),
                'tag' => $request->get('tag'),
                'slug' => Str::slug($request->get('nama_travel_homestay'))
            ]);
                if($request->file('gambar_travel_homestay') != null) {
                    $folder = 'upload/travel_homestay/'.$request->get('gambar_travel_homestay');
                    $file = $request->file('gambar_travel_homestay');
                    $filename = date('YmdHis').$file->getClientOriginalName();
                    $path = realpath($folder);
                    if (!($path !== true AND is_dir($path))) {
                        mkdir($folder, 0755, true);
                    }
                    if(file_exists($foto)){
                        if(File::delete($foto)){
                            if ($file->move($folder, $filename)) {
                                DB::table('travel_homestay')->where('id_travel_homestay', '=', $id_travel_homestay)->update([
                                    'gambar_travel_homestay' => $folder.$filename
                                ]);
                            }
                        }
                    }
                    
                }
                return redirect()->route('travel_homestay.index')->with('Berhasil', 'Data Travel atau Homestay berhasil Diubah');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_travel_homestay)
    {
        try{
            $foto = TravelHomestay::where('id_travel_homestay', $id_travel_homestay)->first()->gambar_travel_homestay;
            if($foto != null){
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        DB::table('travel_homestay')->where('id_travel_homestay', $id_travel_homestay)->delete();
                    }
                }
            }
            return redirect()->route('travel_homestay.index')->with('Berhasil', 'Data Travel atau Homestay berhasil Dihapus');

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
