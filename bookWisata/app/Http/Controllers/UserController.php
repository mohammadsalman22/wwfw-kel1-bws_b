<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::latest()->paginate(5);
        $user = Users::all();
        return view('backend.user.index')->with('user', $user)->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->param['subtitle'] = 'Tambah User';
        $this->param['top_button'] = route('user.index');

        return view('backend.user.create', $this->param);
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
            'username'=>'required|min:6',
            'password'=>'required|confirmed',
            'nama'=>'required',
            'jk'=>'required',
            'alamat'=>'required',
            'no_hp'=>'required',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'foto' => 'required'
        ],
        [
            'required' => 'Harap isi :attribute',
            'alamat.required' => 'Isi Alamat', 
            'min' => 'Panjang karakter minimal 6',
        ],
        [
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'jk' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_hp' => 'Nomer Hp',
            'email' => 'Email',
            'foto' => 'Foto',
        ]);

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
            
            if($request->file('foto') != null) {
                $folder = 'upload/user/'.$request->get('foto');
                $file = $request->file('foto');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if ($file->move($folder, $filename)) {
                    DB::table('user')->where('id_user', '=', $lastId)->update([
                        'foto' => $folder.$filename
                    ]);
                }
            }

            return redirect('user')->withStatus('Berhasil menambah data');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        return view('backend.user.index',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = Users::where('id_user', $user)->first();
        return view('backend.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $request->validate([
            'password' => 'sometimes|nullable|confirmed'
        ]);
        try{ 
            $data = Users::where('id_user', $id_user)->first();
            $foto = Users::where('id_user', $id_user)->first()->foto;
            if (!Hash::check($request->get('password'), $data->password)) {
                DB::table('user')->where('id_user', $id_user)->update([
                    'password' => Hash::make($request->get('password')),
                ]);
            }            

            DB::table('user')->where('id_user', $id_user)->update([
                'username' => $request->get('username'),
                'nama' => $request->get('nama'),
                'jk' => $request->get('jk'),
                'alamat' => $request->get('alamat'),
                'no_hp' => $request->get('no_hp'),
                'email' => $request->get('email')
            ]);

            if($request->file('foto') != null) {
                $folder = 'upload/user/'.$request->get('foto');
                $file = $request->file('foto');
                $filename = date('YmdHis').$file->getClientOriginalName();
                $path = realpath($folder);
                if (!($path !== true AND is_dir($path))) {
                    mkdir($folder, 0755, true);
                }
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        if ($file->move($folder, $filename)) {
                            DB::table('user')->where('id_user', '=', $id_user)->update([
                                'foto' => $folder.$filename
                            ]);
                        }
                    }
                }
                
            }
            return redirect()->route('user.index')->with('Berhasil', 'Data User berhasil Diubah');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        try{
            $foto = Users::where('id_user', $id_user)->first()->foto;
            if($foto != null){
                if(file_exists($foto)){
                    if(File::delete($foto)){
                        DB::table('user')->where('id_user', $id_user)->delete();
                    }
                }
            }
            return redirect()->route('user.index')->with('Berhasil', 'Data User berhasil Dihapus');

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
