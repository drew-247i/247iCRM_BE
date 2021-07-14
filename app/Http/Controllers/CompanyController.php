<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\ViewCompany;
use App\Models\ViewCompanyTechnology;
use App\Models\CompanyTechnology;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Company::create($request->all());
        $technologies = $request->input('technologies');
        foreach($technologies as $technology){
            CompanyTechnology::insert(
               array('company_id' => $company->id,
                'technology_id' => $technology['value'])
            );
        }
        return $company;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $technology = ViewCompanyTechnology::where('company_id',$id)->get();
        $company = ViewCompany::find($id);
        return [ 'technology' => $technology, 'company' => $company];
    }

    public function all_v()
    {
        //
        return ViewCompany::all();
    }

    public function show_v($id)
    {
        //
        return ViewCompany::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $company = Company::find($id)->update($request->all());
        CompanyTechnology::where("company_id", "=", $id)->delete();
        $technologies = $request->input('technologies');
        foreach($technologies as $technology){
            CompanyTechnology::insert(
               array('company_id' => $id,
                'technology_id' => $technology['value'])
            );
        }
        return $company;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::destroy($id);
        return $company;
    }
}
