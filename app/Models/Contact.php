<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['user_id_1','user_id_2'];

    // table name
    public $table = 'contacts';

    //primary key
    public $primarykey = 'id';


}
