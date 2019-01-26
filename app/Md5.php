<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Md5 extends Model
{
    protected $table = 'md5';
    protected $fillable = ['md5', 'raw'];
}
