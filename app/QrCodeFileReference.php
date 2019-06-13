<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QrCodeFileReference extends Model
{
    protected $fillable = [
           'qrcodes_id',
           'file_references_id',
          ];
}
