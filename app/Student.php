<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $dates = ['tanggal_lahir'];
    protected $fillable = ['nis', 'nama', 'user_id', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'alamat', 'anak_ke', 'nm_lengkap_ayah', 'nm_lengkap_ibu', 'no_telp', 'pekerjaan_ayah', 'pekerjaan_ibu', 'pddk_ayah', 'pddk_ibu', 'asal_tk', 'alamat_tk', 'status', 'foto'];

    public function getFoto()
    {
        if (!$this->foto) {
            return asset('img/default.jpg');
        }

        return asset('img/' . $this->foto);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tempat_tanggal_lahir()
    {
        return $this->tempat_lahir . ', ' . $this->tanggal_lahir->format('d M Y');
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function StudentsExtracurriculums()
    {
        return $this->belongsTo(StudentsExtracurriculums::class);
    }

    // public function setClass()
    // {
    //     return $this->hasMany(ClassStudent::class);
    // }

    public function classStudent()
    {
        return $this->hasMany(ClassStudent::class);
    }
    // public function rataRata()
    // {
    //     $total = 0;
    //     // $totalRequests = \App\Grade::all();
    //     foreach ($this->grade as $gr) {
    //         // dd($gr);
    //         $total = $total + $gr->nilai_tugas_2;
    //     }
    //     return $total;
    // }
}
