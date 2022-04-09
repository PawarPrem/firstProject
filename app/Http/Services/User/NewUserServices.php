<?php

namespace App\Http\Services\User;

use App\Models\NewUserModel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Crypt;



class NewUserServices 
 
    {

    public  function CreateUsers($payload) 
    {
        //when insert data make crypt password and encode password.. 
       $majorsalt = env('AUTH_SALT', '');
       $payload['password']   = crypt($this->_encode($payload['password'], $majorsalt), $majorsalt);

        $mainData = NewUserModel::CreateUsers($payload);
        return $mainData;


    }

    function _encode($password, $majorsalt)
    {

        // if PHP5
        if (function_exists('str_split'))
        {
            $_pass = str_split($password);
        }

        // encrypts every single letter of the password
        foreach ($_pass as $_hashpass)
        {
            $majorsalt .= md5($_hashpass);
        }

        // encrypts the string combinations of every single encrypted letter
        // and finally returns the encrypted password
        return md5($majorsalt);
    }	
}
?>
