<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['tanggal','end_tanggal','narasumber','deskripsi','link','name'];
}
