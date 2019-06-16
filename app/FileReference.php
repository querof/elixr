<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileReference extends Model
{
    protected $fillable = [
           'name',
           'mime',
           'description',
          ];

    /**
     * Get the comments for the blog post.
     */
    public function fileStorage()
    {
        return $this->hasMany('App\FileStorage');
    }
}
