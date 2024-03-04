<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\fileImportClass;



class ExcelImportController extends Controller
{

    public function index(){
        return view('admin.excel.excel-import');
    }
    public function import(Request $request)
    {

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
 
        // Get the uploaded file
        $file = $request->file('file');

        $import = new fileImportClass;


       // $data = Excel::import(new fileImportClass, $file);


        try {
            Excel::import($import, $file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        
            $failures = $e->failures();
            $errorMessages = [];
            foreach ($failures as $failure) {
                $errorMessages[] = "Row {$failure->row()}: " . implode(', ', $failure->errors());
            }

            return redirect()->back()->withErrors($errorMessages)->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        // If import is successful, redirect with success message
        $successMessage = 'Excel file imported successfully!';
        $errorMessages = $import->getErrorMessages();

        //dd($errorMessages);
        if (!empty($errorMessages)) {
            // If there are error messages, append them to the success message
            $successMessage .= ' Some rows were not imported. Please check the error messages below:';
        }

        return redirect()->back()->with('success', $successMessage)->withErrors($errorMessages);
        }
}
