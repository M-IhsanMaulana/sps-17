<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'tb_pengaduan';
    protected $fillable = [
        'user_id',
        'tipe_mengadu',
        'category_id',
        'idpengaduan',
        'judul_pengaduan',
        'detail_pengaduan',
        'tgl_pengaduan',
        'bukti_pengaduan',
        'status',
        'taggapan'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'idpengaduan' => [
                'format' => function () {
                    return 'PSV' . date('dmY') . '?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 3 // The number of digits in the autonumber
            ]
        ];
    }
}
