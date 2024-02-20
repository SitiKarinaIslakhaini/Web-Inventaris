<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';

    protected $fillable=[
        'siswa_id',
        'barang_id',
        'tgl_pinjam',
        'tgl_kembali',

    ];
    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'siswa_id');

    }
    public function barang()
    {
        return $this->belongsTo(barang::class, 'barang_id');

    }
}
