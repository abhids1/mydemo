<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Country extends Model
{
    use HasFactory;
    public static function getCountryData(){
        $value=DB::table('countries')->orderBy('id', 'asc')->get();
        return $value;
      }
}
