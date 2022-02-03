<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\ClientPricing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $pricing=ClientPricing::get();
        $client=Client::get();
        //echo $pricing;
        //echo $client;

       return view('clients.create',compact('client','pricing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo count($request->weight);
        // echo count($request->station);
        // echo count($request->mode_of_convience);

        //print_r($request->all());
        //die();
        DB::beginTransaction();
        try{
            $c=Client::create([
                'client_name'=>$request->client_name,
                'gst_number'=>$request->gst_number,
                'contact'=>$request->contact,
                'address'=>$request->address,
            ]);
            for($i=0;$i<count($request->weight);$i++){
                //   echo $request->weight_cost[$i]."<br>";
                    ClientPricing::create([
                        'client_id'=>$c->id,
                        'mode_of_pricing'=>$request->mode_of_pricing[$i],
                        'weight'=>$request->weight[$i],
                        'cost'=>$request->cost[$i],
                        'station'=>$request->station[$i],
                        'mode_of_convience'=>$request->mode_of_convience[$i],
                    ]);
                }
                DB::commit();
                return redirect()->route('client.create')->with('success','Client added Successfully');    
        }
        catch(Exception $variable){
            DB::rollback();
        }

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
