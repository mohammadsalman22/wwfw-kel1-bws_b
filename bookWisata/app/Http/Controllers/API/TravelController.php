<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TravelHomestay;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function filterTravel(Request $request) {
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

    public function getTravel() {
        $status = null;
        $message = null;
        $data = null;

        try {
            $data = TravelHomestay::where('tag', 'like', '%travel%')->inRandomOrder()->limit(4)->get();

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

    public function listTravel() {
        $status = null;
        $message = null;
        $data = null;

        try {
            $data = TravelHomestay::where('tag', 'like', '%travel%')->get();

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
