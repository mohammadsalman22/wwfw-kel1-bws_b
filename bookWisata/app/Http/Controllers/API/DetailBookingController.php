<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DetailBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailBookingController extends Controller
{
    public function getDetailBooking()
    {
        $status = null;
        $message = null;
        $data = null;

        try {
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

    public function postDetailBooking(Request $request) {
        $status = null;
        $message = null;
        $data = null;

        try{
            $array = $request->only([
                'kode_booking', 'id_wisata', 'id_travel_homestay', 'jumlah_pesan'
            ]);

            $data = DetailBooking::create($array);

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
