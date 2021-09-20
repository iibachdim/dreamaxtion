<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Guru;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Guru
        $you = auth()->user();
        $guru = Guru::where('gurus.user_id', '=', $you->id)
                    ->get();

        foreach($guru as $g){
            $jadwal = Jadwal::select('jadwals.*', 'siswas.name','users.foto', 'siswas.id')
                            ->leftjoin('siswas', 'jadwals.siswa_id', '=', 'siswas.id')
                            ->leftjoin('users', 'siswas.user_id', '=', 'users.id')
                            ->where('jadwals.guru_id', '=', $g->id)
                            ->where('jadwals.status', '=', 1)
                            ->get();
        }

        return view('jadwal.jadwal_guru', compact('jadwal'));
    }

    //Guru
    public function pengajuanJadwal()
    {
        $you = auth()->user();
        $guru = Guru::where('gurus.user_id', '=', $you->id)
                    ->get();

        foreach($guru as $g){
            $pengajuan = Jadwal::select('jadwals.*', 'siswas.name', 'users.foto', 'users.email')
                            ->leftjoin('siswas', 'jadwals.siswa_id', 'siswas.id')
                            ->leftjoin('users', 'siswas.user_id', '=', 'users.id')
                            ->where('jadwals.status', '=', 0)
                            ->where('jadwals.guru_id', '=', $g->id)
                            ->get();
        }
        return view('jadwal.pengajuan-jadwal', compact('pengajuan'));
    }

    public function acceptPengajuan(Request $request, $id)
    {
        $accept = Jadwal::find($id);
        $accept->status = 1;
        $accept->save();

        return redirect()->route('user.jadwal-list');
    }

    public function declinePengajuan(Request $request, $id)
    {
        $decline = Jadwal::find($id);
        $decline->status = 2;
        $decline->save();

        return redirect()->route('user.jadwal-list');
    }

    //Siswa
    public function tambahJadwal()
    {
        $guru = Guru::select('gurus.*', 'users.name', 'users.foto', 'users.email')
                    ->leftjoin('users', 'gurus.user_id', '=', 'users.id')
                    ->where('gurus.status', '=', 1)
                    ->get();

        return view('jadwal.tambah_jadwal', compact('guru'));
    }

    public function storeJadwal(Request $request)
    {
        $you = auth()->user();
        $siswa = Siswa::select('siswas.*', 'users.name', 'users.foto',)
                    ->leftjoin('users', 'users.id', '=', 'siswas.user_id')
                    ->where('users.id', '=', $you->id)
                    ->get();

        foreach($siswa as $s){
            $you = auth()->user();
            $jadwal = new Jadwal();
            $jadwal->guru_id = $request->guru_id;
            $jadwal->siswa_id = $s->id;
            $jadwal->tanggal = $request->tanggal;
            $jadwal->waktu = $request->waktu;
            $jadwal->status = 0;
            $jadwal->save();
        }

        return redirect()->route('daftar-pengajuan-siswa');
    }

    //Siswa
    public function daftarPengajuan()
    {
        $you = auth()->user();
        $siswa = Siswa::select('siswas.*', 'users.name', 'users.foto',)
                    ->leftjoin('users', 'users.id', '=', 'siswas.user_id')
                    ->where('users.id', '=', $you->id)
                    ->get();

        foreach($siswa as $s){
            $jadwal = Jadwal::select('users.name', 'users.foto', 'gurus.id', 'jadwals.*')
                            ->leftjoin('gurus', 'jadwals.guru_id', '=', 'gurus.id')
                            ->leftjoin('users', 'gurus.user_id', '=', 'users.id')
                            ->where('jadwals.status', '=', 0)
                            ->where('jadwals.siswa_id', '=', $s->id)
                            ->get();
        }

        return view('jadwal.daftar_pengajuan-siswa', compact('you','siswa', 'jadwal'));

    }

    public function jadwalSiswa()
    {
        $you = auth()->user();
        $siswa = Siswa::select('siswas.*', 'users.name', 'users.foto')
                    ->leftjoin('users', 'users.id', '=', 'siswas.user_id')
                    ->where('users.id', '=', $you->id)
                    ->get();

        foreach($siswa as $s){
            $jadwal = Jadwal::select('users.name', 'gurus.id', 'jadwals.*')
                            ->leftjoin('gurus', 'jadwals.guru_id', '=', 'gurus.id')
                            ->leftjoin('users', 'gurus.user_id', '=', 'users.id')
                            ->where('jadwals.status', '=', 1)
                            ->where('jadwals.siswa_id', '=', $s->id)
                            ->get();
        }
        return view('jadwal.jadwal_siswa', compact('you','siswa', 'jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
