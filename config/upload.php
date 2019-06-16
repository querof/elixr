<?php

use Illuminate\Support\Str;

return [

    'MAX_FILE_SIZE' => env('MAX_FILE_SIZE',200000000000000),
    'MAX_CHUNK_SIZE' => env('MAX_CHUNK_SIZE',10000000),
];
