<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $guarded = ['nisn'];
 
    public function getAuthPassword()
    {
     return $this->siswa_password;
    }
}
