<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return response(Account::all())->header('X-Total-Count', 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'business_address' => 'required',
            'billing_address' => 'required',
            'annual_revenue' => 'required',
            'mother_company' => 'required',
            'account_type' => 'required',
            'technology' => 'required'
        ]);
        Account::create($request->all());
        return response()->json([
            'status'=> 200,
            'message' => 'Account Successfully Added'
        ]);
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
        return Account::find($id);
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
        $account = Account::find($id)->update($request->all());
        return $account;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::destroy($id);
        return $account;
    }


    /**
     * search company_name from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($search)
    {
        $account = Account::where('company_name','like', '%'.$search.'%')->get();
        return $account;
    }
}
