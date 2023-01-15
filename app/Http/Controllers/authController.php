<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\File;



class authController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
        //melakukan redirect ke halaman google
    }

    public function callback(Request $request)
    {
        $user_google = Socialite::driver('google')->user();
        $user = User::where('email', $user_google->getEmail())->first();
        $id = $user_google->getId();
        $avatar = $user_google->getAvatar();


        //$user di isi dengan data user yang sudah ada di database
        //$user mengambil data dari database dari model user berdasarkan email yang di dapat dari google


        if ($user != null) {
            $avatar_file = $id . ".jpg";
            $file_contents = file_get_contents($avatar);
            File::put(public_path("admin/images/faces/$avatar_file"), $file_contents);
            // file_put_contents(public_path('images/' . $avatar_file), $file_contents);

            //jika user tidak null atau atau sudah ada maka user akan login
            auth()->login($user, true);
            //// Melakukan proses login dengan menandai objek pengguna tersebut sebagai pengguna yang sedang login
            $user->update([
                'email_verified_at' => Carbon::now(),
                'google_id' => $id,
                'avatar' => $avatar_file

            ]);
            //jika user sudah ada di database maka akan di update email_verified_at
            //

            Auth::login($user);
            return redirect()->intended('/dashboard');
            //selanjutnya akan di redirect ke halaman utama


        } else {
            return redirect()->to('/auth')->with('error', 'Anda Tidak Memiliki Akses admin');






            //namun jika user tidak ada di database maka akan di buatkan user baru

            // $create = User::create([
            //     'email'             => $user_google->getEmail(),
            //     //email di ambil dari google(user_google itu variabel di dapat dari auth google
            //     'name'              => $user_google->getName(),
            //     'password'          => 0,
            //     'google_id'         => $user_google->getId(),
            //     'email_verified_at' => Carbon::now()
            // ]);



            // auth()->login($create, true);
            // Melakukan proses login dengan menandai objek pengguna tersebut sebagai pengguna yang sedang login
            // return redirect()->intended('/');
            //selanjutnya akan di redirect ke halaman utama
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/auth');
    }
}
