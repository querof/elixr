<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrCodeFileReference extends Model
{
    protected $fillable = [
           'qrcodes_id',
           'file_references_id',
          ];


    /**
     * Get the Qrcode for the relationship with File reference.
     */
    public function qrcode()
    {
        return $this->belongsTo('App\Qrcode');
    }

    /**
     * Get the File reference for the relationship with Qrcode.
     */
    public function fileReferences()
    {
        return $this->belongsTo('App\FileReference');
    }
}
