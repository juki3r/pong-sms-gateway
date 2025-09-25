<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Espdevice extends Model
{
    protected $fillable = ['name', 'firmware_version', 'ota_key'];
}
