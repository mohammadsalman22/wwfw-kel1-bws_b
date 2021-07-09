<?php

namespace App\Http\Controllers;

use App\Models\Metode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metode_pembayaran = Metode::all();
        return view('backend.metode.index')->with('metode_pembayaran', $metode_pembayaran);//->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['subtitle'] = 'Tambah Metode Pembayara';
        $this->param['top_button'] = route('metode.index');

        return view('backend.metode.create', $this->param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required|min:2',
            'no_tujuan'=>'required'
        ],
        [
            'required' => 'Harap isi :attribute', 
            'min' => 'Panjang karakter minimal 2'
        ],
        [
            'nama' => 'Nama',
            'no_tujuan' => 'Nomer Tujuan Rekening'
        ]);

        try{
            $data = array(
                'nama' => $request->get('nama'),
                'no_tujuan' => $request->get('no_tujuan')
            );

            $lastId = DB::table('metode_pembayaran')->insertGetId($data, 'id_pembayaran');

            return redirect('metode')->withStatus('Berhasil menambah data');
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
     * @param  \App\Models\Metode  $metode
     * @return \Illuminate\Http\Response
     */
    public function show(Metode $metode)
    {
        return view('backend.metode.index',compact('metode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Metode  $metode
     * @return \Illuminate\Http\Response
     */
    public function edit($metode)
    {
        $metode = Metode::where('id_pembayaran', $metode)->first();
        return view('backend.metode.edit',compact('metode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Metode  $metode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pembayaran)
    {
        $request->validate([
        ]);
        try{ 
            $data = Metode::where('id_pembayaran', $id_pembayaran)->first();          

            DB::table('metode_pembayaran')->where('id_pembayaran', $id_pembayaran)->update([
                'nama' => $request->get('nama'),
                'no_tujuan' => $request->get('no_tujuan')
            ]);

            return redirect()->route('metode.index')->with('Berhasil', 'Data Metode Pembayaran berhasil Diubah');
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
     * @param  \App\Models\Metode  $metode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pembayaran)
    {
        try{
            $foto = Metode::where('id_pembayaran', $id_pembayaran)->first()->foto;
            
            DB::table('metode_pembayaran')->where('id_pembayaran', $id_pembayaran)->delete();
             
            return redirect()->route('metode.index')->with('Berhasil', 'Data Metode Pembayaran berhasil Dihapus');

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
