<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Age extends Model
{
    use HasFactory;
    public static function getAge(){
        $getAge = DB::table('ages')->pluck('age','id');
        return $getAge;
    }
}
