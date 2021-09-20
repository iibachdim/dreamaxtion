<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guru;
use App\Siswa;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $you = auth()->user();
        $guru = User::select('users.name', 'users.role', 'users.foto', 'gurus.user_id', 'gurus.status')
                    ->leftjoin('gurus', 'users.id', '=', 'gurus.user_id')
                    ->where('users.id', '=', $you->id)
                    ->get();

        foreach($guru as $g){
            $status = $g->status;
            if($g->role == 'guru'){
                return view('profile.profile', compact('you', 'guru', 'status'));
            }else if($g->role == 'siswa'){
                return view('profile.profile_siswa', compact('you', 'guru', 'status'));
            }
        }


    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $file = $request->file('foto');

        if(!empty($file)){
            $nama_file = time()."_".$file->getClientOriginalName();
            $destination = 'foto_user';
            $file->move($destination,$nama_file);

            $profile = User::find(auth()->user()->id);
            $profile->name = $request['name'];
            $profile->email = $request['email'];
            $profile->no_telp = $request['no_telp'];
            $profile->foto = $nama_file;
            $profile->save();
        }else {
            $profile = User::find(auth()->user()->id);
            $profile->name = $request['name'];
            $profile->email = $request['email'];
            $profile->no_telp = $request['no_telp'];
            $profile->save();
        }

        $you = auth()->user();
        $guru = Guru::where('gurus.user_id', '=', $you->id)->get();
        $siswa = Siswa::where('siswas.user_id', '=', $you->id)->get();
        if($you->role == 'guru'){
            foreach($guru as $g){
                $guru_profile = Guru::find($g->id);
                $guru_profile->name = $request['name'];
                $guru_profile->save();
            }
        }else if($you->role == 'siswa'){
            foreach($siswa as $s){
                $siswa_profile = Siswa::find($s->id);
                $siswa_profile->name = $request['name'];
                $siswa_profile->save();
            }
        }

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

}
