<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tambah()
    {
        return view('user\tambah');
    }

    public function simpan(UserRequest $request)
    {
        $data = $request->validated();
        $model = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        try {
            $model->save();
            return redirect('user');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user\edit', compact('user'));
    }

    public function update($id, UserRequest $request)
    {
        $data = $request->validated();
        $model = User::find($id);
        $model->fill($data);
        try {
            $model->save();
            return redirect('user');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function hapus($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user');
    }
}
