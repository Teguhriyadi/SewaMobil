<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenMobil extends Model
{
    use HasFactory, HasUuids;

    protected $table = "manajemen_mobil";

    protected $guarded = [''];

    public $primaryKey = "id_manajemen";

    protected $keyType = "string";

    public function users()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }
}
