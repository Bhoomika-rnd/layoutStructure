<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Http\Request;
use App\Models\Leads;



class fileImportClass implements ToCollection
{
    /**
    * @param Collection $collection
    */

           protected $errorMessages = [];


    public function collection(Collection $collection)
    {
        //dd($collection);
        $rows = $collection;
        $return = array();
        $row_arr = array();
        $data_arr = array();



        if(!empty($rows) && $rows->count()){
             foreach ($rows as $row) {
                
                // Skip the header row
                if ($row->first() === 'firstName') {
                    continue;
                }

                $email = $row->get(2); // Assuming 'email' is the third column
                $phone = $row->get(3);
                $existingLead = Leads::where('email', $email)
                                ->orWhere('phone', $phone)
                                ->first();

                if ($existingLead) {

                    if ($existingLead->email === $email) {
                        $this->errorMessages[] = "Email '{$email}' already exists.";
                    }
                    if ($existingLead->phone === $phone) {
                        $this->errorMessages[] = "Phone number '{$phone}' already exists.";
                    }


                    /*$existingLead->update([
                        'firstName' => $row->get(0), 
                        'lastName' => $row->get(1),
                        'email' => $email,
                        'phone' => $phone,
                        //'status' => $row->get(4),
                    ]);*/


                } else {
                    Leads::create([
                        'firstName' => $row->get(0),
                        'lastName' => $row->get(1),
                        'email' => $email,
                        'phone' => $phone,
                       // 'status' => $row->get(4),
                    ]);
                }
            }
        }

        
    }
    public function model(array $row)
    {
        dd($row);
        // Define how to create a model from the Excel row data
        return new YourModel([
            'column1' => $row[0],
            'column2' => $row[1],
            // Add more columns as needed
        ]);
    }

    public function getErrorMessages()
    {
        return $this->errorMessages;
    }
}
