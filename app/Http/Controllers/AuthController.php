<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // show login pages
    public function login()
    {
        return view('auth.login');
    }

    public function loginpost(Request $request)
    {
        $messages = [
            'email.required' => 'Masukan alamat email!',
            'email.min' => 'Oops sepertinya bukan email!',
            'email.email' => 'Alamat email anda salah!',
            'email.max' => 'Oops email melampaui batas!',

            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Oops password terlalu pendek!',
        ];

        $validate = Validator::make($request->all(), [
            'email' => 'required|min:4|email|max:255',
            'password' => 'required|min:8',
        ], $messages);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        } else {
            $cek = User::where('email', $request->email)->first();
            if ($cek) {
                $data = User::find($cek->id);
                if (Hash::check($request->password, $data->password)) {
                    Auth::guard('user')->login($data);
                    return redirect()->route('index');
                } else {
                    return back()->withInput()->with('error', 'Oops password anda salah!');
                }
            } else {
                return back()->with('error', 'Oops alamat email kamu salah!');
            }
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerpost(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'username' => 'required|max:100',
            'phone' => 'required|max:12',
            'email' => 'required|min:8|email|unique:users|max:255',
            'password' => 'required|confirmed|min:10',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'filecv' => 'required|mimes:pdf,doc|max:8192',
        ], [
            'username.required' => 'Masukan alamat email',
            'username.max' => 'Username tidak lebih dari 100',
            'phone.max' => 'Nomor telepon tidak boleh kosong!',
            'phone.max' => 'Nomor telepon salah!',
            'email.required' => 'Masukan alamat email!',
            'email.min' => 'Oops sepertinya bukan email!',
            'email.email' => 'Alamat email anda salah!',
            'email.max' => 'Oops email melampaui batas!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Oops password terlalu pendek!',
            'password.confirmed' => 'Oops sepertinya password tidak sama!',
            'images.required'       => 'Images tidak boleh kosong!',
            'images.image'          => 'File bukan gambar!',
            'images.mimes'          => 'File haris berupa gambar!',
            'images.max'            => 'File images terlalu bersar maksimum 2mb!',
            'filecv.required'       => 'Filecv CV tidak boleh kosong!',
            'filecv.mimes'          => 'File harus berupa document!',
            'filecv.max'            => 'File CV terlalu bersar maksimum 8mb!',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        } else {
            // uploat iamges frist
            $resorce = $request->images;
            $NewNameImage = "IMG-" . $request->username . date("YmdHis");
            $avatar = $NewNameImage . "." . $resorce->getClientOriginalExtension();
            $resorce->move(public_path() . "/images/avatar/", $avatar);

            // update CV frist
            $resorceCV = $request->filecv;
            $newnameCV = "CV-" . $request->username . date("YmdHis");
            $fileCV = $newnameCV . "." . $resorceCV->getClientOriginalExtension();
            $resorceCV->move(public_path() . "/files/", $fileCV);

            // save all data
            $data = User::insertGetId([
                'username'  => $request->username,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                'phone'     => $request->phone, 
                'images'    => $avatar,
                'files'     => $fileCV
            ]);
            try {

                // dd($data);
                // Auth::guard('user')->login($data);
                return redirect()->route('index')->with('success', 'Registrasi berhasil silahkan login');
            } catch (\Throwable $th) {
                dd($request->all());
                return redirect()->back()->with('error', 'Maff, layanan sedang sibuk ulangin nanti!');
            }
        }
    }

    public function logout()
    {
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            return redirect()->route('index');
        }
    }
}
