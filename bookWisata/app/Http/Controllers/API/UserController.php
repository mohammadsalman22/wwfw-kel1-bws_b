<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUser(Request $request) {
        $status = null;
        $message = null;
        $data = null;

        try {
            $data = Users::select('id_user', 'username', 'password', 'nama', 'jk', 'alamat', 'no_hp', 'email')->where('username', $request->get('username'))->first();

            if($data != null) {
                // akun ada
                if(\Hash::check($request->get('password'), $data->password)) {
                    $message = 'Berhasil';
                }
                else {
                    $data = null;
                    $message = 'Password salah';
                }

            }
            else {
                // akun tidak ada
                $message = 'Akun tidak ditemukan';
            }

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
                'message' => $message,
                'data' => $data
            ];
            return response($result, $status);
        }
    }

    public function postUser(Request $request) {
        $status = null;
        $message = null;
        $data = null;

        try{
            $data = array(
                'username' => $request->get('username'),
                'password' => Hash::make($request->get('password')),
                'nama' => $request->get('nama'),
                'jk' => $request->get('jk'),
                'alamat' => $request->get('alamat'),
                'no_hp' => $request->get('no_hp'),
                'email' => $request->get('email')
            );

            $lastId = DB::table('user')->insertGetId($data, 'id_user');

            // if($request->file('foto') != null) {
            //     $folder = 'upload/user/'.$request->get('foto');
            //     $file = $request->file('foto');
            //     $filename = date('YmdHis').$file->getClientOriginalName();
            //     $path = realpath($folder);
            //     if (!($path !== true AND is_dir($path))) {
            //         mkdir($folder, 0755, true);
            //     }
            //     if ($file->move($folder, $filename)) {
            //         DB::table('user')->where('id_user', '=', $lastId)->update([
            //             'foto' => $folder.$filename
            //         ]);
            //     }
            // }

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
