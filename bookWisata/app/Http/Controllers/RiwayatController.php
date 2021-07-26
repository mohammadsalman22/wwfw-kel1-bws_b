<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    private $param;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->param['wisata'] = Booking::select('booking.*', 'detail_booking.*', 'wisata.nama_wisata','user.nama')
                                        ->join('detail_booking', 'detail_booking.kode_booking', 'booking.kode_booking')
                                        ->join('wisata', 'wisata.id_wisata', 'detail_booking.id_wisata')
                                        ->join('user', 'user.id_user', 'booking.id_user')
                                        ->orderBy('booking.updated_at', 'ASC')
                                        ->get();

        $this->param['travelhomestay'] = Booking::select('booking.*', 'detail_booking.*', 'travel_homestay.nama_travel_homestay','user.nama')
                                        ->join('detail_booking', 'detail_booking.kode_booking', 'booking.kode_booking')
                                        ->join('travel_homestay', 'travel_homestay.id_travel_homestay', 'detail_booking.id_travel_homestay')
                                        ->join('user', 'user.id_user', 'booking.id_user')
                                        ->orderBy('booking.updated_at', 'ASC')
                                        ->get();

        return view('backend.riwayat.index', $this->param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            DB::table('booking')->where('kode_booking', $id)->update([
                'status' => $request->get('status'),
            ]);

            return redirect()->route('riwayat.index')->with('Berhasil', 'Data Metode Pembayaran berhasil Diubah');
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
    public function destroy($id)
    {
        //
    }
}
