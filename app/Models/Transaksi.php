<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory, HasUuids;

    protected $table = "transaksi";

    protected $guarded = [''];

    public $primaryKey = "id_transaksi";

    protected $keyType = "string";

    public $timestamps = false;

    public function mobil()
    {
        return $this->belongsTo("App\Models\ManajemenMobil", "mobil_id", "id_manajemen");
    }
}
