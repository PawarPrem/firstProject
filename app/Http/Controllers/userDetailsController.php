<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Services\User\NewUserServices;

class userDetailsController extends Controller
{
    public function showCreateUsers(Request $req)
    {
        return view('registerfrom');
    }

    function CreateUsers(Request $req)
    {
        
        $payload = $req->all();
        
        $firstnameRules    =  ['firstname'     => 'required'];
        $lastnameRules     =  ['lastname'      => 'required'];
        $emailRules        =  ['email'         => 'required|email|unique:sign_up'];
        $passwordRules     =  ['password'      => 'required|min:8'];
        $phoneNumberRules  =  ['phone_number'  => 'required|max:12|min:10|unique:sign_up'];
        $subscriptionRules =  ['subscription'  => 'required|numeric'];

        //valid firstname
        $validFirstName = validator::make($req->all(), $firstnameRules);
            if ($validFirstName->fails()) 
            {
                $data['firstnameErr'] =  "please enter a valid firstname.";
            }else{
                $data['firstnameErr'] = '';
            }

            
        //valid lastname
        $validLastName = validator::make($req->all(), $lastnameRules);
            if ($validLastName->fails()) 
            {
                $data['lastnameErr'] = "please enter a valid lastname.";
            }else{
                $data['lastnameErr'] = '';
            }

        //valid email
        $validEmail = validator::make($req->all(), $emailRules);
            if ($validEmail->fails()) 
            {
                $data['emailErr'] = " please enter a valid emailRules.";
            }else{
                $data['emailErr'] = '';
            }

        //valid password
        $validPassword = validator::make($req->all(), $passwordRules);
            if ($validPassword->fails())
            {
                $data['passwordErr'] = "please enter a valid password.";
            }else{
                $data['passwordErr'] = '';
            }

        //valid password
        $validPhoneNumber = validator::make($req->all(), $phoneNumberRules);
            if ($validPhoneNumber->fails())
             {
                $data['phoneErr'] = "please enter a valid Phone number.";
             }else{
                $data['phoneErr'] = '';
             }

        //valid subscription
        $validSubscription = validator::make($req->all(), $subscriptionRules);
            if ($validSubscription->fails())
             {
                $data['subscriptionErr'] = "please take a valid subscription.";
             }else{
                $data['subscriptionErr'] = '';
             }
        //insert data in database.ccc
         $ServicesData = new NewUserServices;
         $mainData     = $ServicesData->CreateUsers($payload);


        //set data in redis
       // $setDataInRedis = $ServicesData->checkcredential($payload); 
        
        $data['message'] = 'User created successful.';
        return $data;
    }

    function pdfConverter()
    {
        return view('ifsageement');
    }
}
