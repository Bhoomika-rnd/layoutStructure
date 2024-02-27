<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Leads extends Model
{
    use HasFactory;
    protected $table='leads';
    protected $fillable = ['firstName', 'lastName', 'email', 'phone','status'];

    public static function validateLeadsCreate($data){

        $rules = array(
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:leads',
            'phone' => 'required|numeric|digits:10|unique:leads',

        );  
        $messages = [
            'firstName.required' => 'First name is required',
            'lastName.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone number is required',
        ];

        return Validator::make($data, $rules,$messages);

    }

    public static function validateLeadsUpdate($data,$leadId){

        $rules = array(
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:leads,email,' . $leadId,
            'phone' => 'required|numeric|digits:10|unique:leads,phone,' . $leadId,

        );  
        $messages = [
            'firstName.required' => 'First name is required',
            'lastName.required' => 'Last name is required',
            'email.required' => 'Email is required',
            'phone.required' => 'Phone number is required',
        ];

        return Validator::make($data, $rules,$messages);
    }

    public static function createLeads($data){

        $leads = Leads::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
    
        return $leads;
    }



}
