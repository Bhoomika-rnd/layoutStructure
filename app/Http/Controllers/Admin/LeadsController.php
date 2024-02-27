<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leads;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;



class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|JsonResponse
    {
        $leads = Leads::all();


        if($request->header('Authorization')){
            return success('1','leads data',$leads);

        }else{
           // dd("not");
            return view('admin.leads.index',compact('leads'));

        }


        return view('admin.leads.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = "Leads";

        $validation = Leads::validateLeadsCreate($request->all());
        if($validation->fails() == false){
            $leads = Leads::createLeads($request->all());

            if($request->header('Authorization')){
                return success('1','lead created successfully.',$leads);

            }else{
                return redirect('/leads')->withSuccess('lead created successfully.');
            }
        }else{
            if($request->header('Authorization')){
                 return error('0',$validation->errors()->first(),VALIDATION_FAILED);
            }else{
                return back()->withInput()->withErrors($validation->errors());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
