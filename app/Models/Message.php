<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Message extends Model
{
    use HasFactory;

    protected $fillable=['from','to','message','is_read'];
    // table name
    public $table = 'messages';

    //primary key
    public $primarykey = 'id';

    //TimeStamps
    public $timestamps = true;
}
