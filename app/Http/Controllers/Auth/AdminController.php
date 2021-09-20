<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Guru;
use App\Siswa;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Jadwal;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.profile');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function userList()
    {
        $user = User::all();

        return view('admin.user.index', compact('user'));
    }

    public function userDelete(Request $request)
    {
        $user = User::find($request->id);
        if($user){
            $user->delete();
        }

        return back()->withStatus(__('User successfully deleted.'));
    }

    public function guruList()
    {
        $guru = Guru::select('gurus.*', 'users.email', 'users.foto')
                    ->leftjoin('users', 'gurus.user_id', 'users.id')
                    ->where('gurus.status', '=', 1)
                    ->get();

        return view('admin.guru.index', compact('guru'));
    }

    public function pengajuanGuru()
    {
        $pengajuan = Guru::select('gurus.*', 'users.name', 'users.foto', 'users.email')
                    ->leftjoin('users', 'gurus.user_id', 'users.id')
                    ->where('gurus.status', '!=', 1)
                    ->get();

        return view('admin.guru.pengajuan', compact('pengajuan'));
    }

    public function accept(Request $request, $id)
    {
        $accept = Guru::find($id);
        $accept->status = 1;
        $accept->save();

        return redirect()->back();
    }

    public function reject($id)
    {
        $accept = Guru::findOrFail($id);
        $accept->status = 2;
        $accept->save();

        return redirect()->back();
    }

    public function siswaList()
    {
        $siswa = Siswa::select('siswas.*', 'users.email', 'users.foto')
                    ->leftjoin('users', 'siswas.user_id', 'users.id')
                    ->get();

        return view('admin.siswa.index', compact('siswa'));
    }

    public function listJadwal()
    {
        $jadwal = Jadwal::select('gurus.name as nama_guru', 'siswas.name as nama_siswa', 'jadwals.*')
                        ->leftjoin('gurus', 'jadwals.guru_id', '=', 'gurus.id')
                        ->leftjoin('siswas', 'jadwals.siswa_id', '=', 'siswas.id')
                        ->where('jadwals.status', '=', 1)
                        ->where('jadwals.tanggal', '>=', now())
                        ->get();

        return view('admin.jadwal.index', compact('jadwal'));
    }
}
