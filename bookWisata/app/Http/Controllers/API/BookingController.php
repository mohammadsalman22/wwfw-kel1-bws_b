<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DetailBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function getBooking()
    {
        $status = null;
        $message = null;
        $data = null;

        try {
            $data = Booking::all();
            $data = DetailBooking::all();

            $status = 200;
            $message = 'Berhasil';
        } catch (\Exception $e) {
            $status = 400;
            $message = $e->getMessage();
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 400;
            $message = $e->getMessage();
        } finally {
            $result = [
                'status' => $status,
                'message' => $message,
                'data' => $data
            ];
            return response($result, $status);
        }
    }

    public function postBooking(Request $request) {
        $status = null;
        $message = null;
        $data = null;

        try{
            $data = new Booking;
            $data->waktu_mulai = $request->get('waktu_mulai');
            $data->waktu_akhir = $request->get('waktu_akhir');
            $data->total_harga = $request->get('total_harga');
            $data->status = $request->get('status');
            $data->id_pembayaran = $request->get('id_pembayaran');
            $data->id_user = $request->get('id_user');
            $data->save();

            $data2 = new DetailBooking;
            $data2->kode_booking = $data->id;
            $data2->jumlah_pesan = $request->get('jumlah_pesan');
            if($request->get('id_travel_homestay') != null) {
                $data2->id_travel_homestay = $request->get('id_travel_homestay');
            }
            if($request->get('id_wisata') != null) {
                $data2->id_wisata = $request->get('id_wisata');
            }
            $data2->save();

            $message = 'berhasil menambahkan data';
            $status = 200;

        } catch (\Exception $e) {
            $status = 400;
            $message = $e->getMessage();
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 400;
            $message = $e->getMessage();
        } finally {
            $result = [
                'status' => $status,
                'message' => $message
            ];
            return response($result, $status);
        }
    }
}
