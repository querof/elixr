<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    protected $fillable = [
             'title',
             'description',
            ];

    /**
     * Get the Media for the QrCode.
     */
    public function qrcodeFileReference()
    {
        return $this->hasMany('App\QrcodeFileReference');
    }
}
