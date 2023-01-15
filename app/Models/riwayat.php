<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayats';
    protected $fillable = ['judul', 'tipe', 'tgl_mulai', 'ahir', 'info1', 'info2', 'info3', 'isi'];
    protected $appends = ['tgl_mulai_indo', 'ahir_indo'];

    public function getTglMulaiIndoAttribute()
    {
        return Carbon::parse($this->attributes['tgl_mulai'])->translatedFormat('d F Y');
    }

    public function getAhirIndoAttribute()
    {
        if ($this->attributes['ahir']) {
            return Carbon::parse($this->attributes['ahir'])->translatedFormat('d F Y');
        } else {
            return 'Present';
        }
    }
}
