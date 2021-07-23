<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Metode;
use Illuminate\Http\Request;

class MetodeController extends Controller
{
    public function getMetode()
    {
        $status = null;
        $message = null;
        $data = null;

        try {
            $data = Metode::all();

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
