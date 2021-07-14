<?php
namespace App\Http\Controllers;
use App\Models\Lead;
use App\Models\LeadNextstep;
use App\Models\ViewLead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ViewLead::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Lead::create($request->all());
    }

    public function storeNextStep(Request $request)
    {
        return LeadNextstep::create($request->all());
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
        return ViewLead::find($id);
    }


    public function showSingleNextStep($id)
    {
        //
        return LeadNextstep::find($id);
    }

    public function showNexsteps($lead_id)
    {
        return LeadNextstep::where('lead_id', "=",$lead_id)->get();
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
        $lead = Lead::find($id)->update($request->all());
        return $lead;
    }

    public function updateNextStep(Request $request, $id)
    {
        //
        $leadNextstep = LeadNextstep::find($id)->update($request->all());
        return $leadNextstep;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = Lead::destroy($id);
        return $lead;
    }
}
