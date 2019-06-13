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
     * Get the comments for the blog post.
     */
    public function fileReferences()
    {
        return $this->belongsTo('App\FileReference');
    }
}
