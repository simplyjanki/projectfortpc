<?php

namespace App\Http\Controllers;
use App\Models\DailyClientEntry;
use App\Models\Client;
use App\Models\ClientPricing;
use Illuminate\Http\Request;

class DailyClientEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientt=Client::get();
        $stationn=ClientPricing::get();
        return view('dailyentries.create',compact('clientt','stationn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all());
        for($i=0;$i<count($request->hawb_number);$i++){
            DailyClientEntry::create([
                'client_id'=>$request->client_id[$i],
                'date_of_entry'=>$request->date_of_entry[$i],
                'hawb_number'=>$request->hawb_number[$i],
                'weight_range'=>$request->weight_range[$i],
                'weight_cost'=>$request->weight_cost[$i],//changed in db as varchar
                'destination'=>$request->destination[$i],
                'mode'=>$request->mode[$i],
                'total_charges'=>$request->total_charges[$i],
                

            ]);
        }
        return redirect()->route('client.create');

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
