<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileStorage extends Model
{
  protected $fillable = [
           'file_references_id',
           'data_chunk',
          ];
}
