<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tin extends Model
{
    //
    protected $table = 'tins';
    protected $primaryKey = 'id';
    protected $dates = ['ngayDang'];

    protected $fillable = [
        'tieuDe',
        'tomTat',
        'urlHinh',
        'noiDung',
        'idLT',
        'noiBat',
        'anHien',
        'tags'

    ];



}
