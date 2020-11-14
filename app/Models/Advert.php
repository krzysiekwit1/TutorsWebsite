<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    // table name
    public $table = 'adverts';

    //primary key
    public $primarykey = 'id';

    //TimeStamps
    public $timestamps = true;
    public function user(){
        return $this->belongsTo('App\User');
    }
}
