<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'status','kode_status');
    }
}
