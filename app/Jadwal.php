<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'guru_id', 'siswa_id', 'tanggal', 'waktu', 'status',
    ];
}
