<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileStorage extends Model
{
    protected $fillable = [
           'file_references_id',
           'data_chunk',
          ];

    /**
     * Get the File reference for the Actually data of the file.
     */
    public function fileReferences()
    {
        return $this->belongsTo('App\FileReference');
    }
}
