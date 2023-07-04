<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pdf extends Model
{
    protected $fillable = ['name', 'uploaded_by', 'url', 'cover'];
}
