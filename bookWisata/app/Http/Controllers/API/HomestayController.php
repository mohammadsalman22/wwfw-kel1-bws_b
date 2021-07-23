<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TravelHomestay;
use Illuminate\Http\Request;

class HomestayController extends Controller
{
    public function filterHomestay(Request $request) {
        $status = null;
        $message = null;
        $data = null;

        try {
            $data = TravelHomestay::where('tag', 'like', '%'.$request->get('tag').'%')->inRandomOrder()->get();

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

    public function getTravelHomestay(Request $request) {
        $status = null;
        $message = null;
        $data = null;

        try {
            $data = TravelHomestay::where('tag', 'like', '%'.$request->get('nama_wisata').'%')->inRandomOrder()->get();

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

    public function getHomestay() {
        $status = null;
        $message = null;
        $data = null;

        try {
            $data = TravelHomestay::where('tag', 'like', '%homestay%')->inRandomOrder()->limit(6)->get();

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

    public function listHomestay() {
        $status = null;
        $message = null;
        $data = null;

        try {
            $data = TravelHomestay::where('tag', 'like', '%homestay%')->get();

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
}
