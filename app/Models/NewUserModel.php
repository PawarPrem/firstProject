<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewUserModel extends Model
{
    use HasFactory;
    public static function CreateUsers($value)
   {
    try {
       $insertData = 
                [
                    "firstname"    => $value['firstname'],
                    "lastname"     => $value['lastname'],
                    "email"        => $value['email'],
                    "password"     => $value['password'],
                    "phone_number" => $value['phone_number'],
                    "subscription" => $value['subscription']
                ];

     $mainData = DB::table('sign_up')->insert($insertData);
     Log::info('Data inserted successfully');
     return $mainData;
   } catch (Exception $e) {
       Log::info("Got exception in " . __METHOD__ . " " . PHP_EOL . $e->getMessage());
   }

   }
}
