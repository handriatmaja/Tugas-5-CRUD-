<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'sks', 'dosen_id'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}