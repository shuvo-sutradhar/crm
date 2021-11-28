<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Attandance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttandanceResource;

class AttandanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AttandanceResource::collection(Attandance::latest()->paginate(10));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'user'              =>  'required',
            'check_in_date'     =>  'required_if:status,present',
            'check_in_time'     =>  'required_if:status,present',
            'status'            =>  'required',
        ]);

        $checkInTime = $request->check_in_time ? $request->check_in_time.':00' : '00:00:00';
        $punchedIn = $request->check_in_date ? $request->check_in_date . ' ' . $checkInTime : null;

        $checkOutTime = $request->check_out_time ? $request->check_out_time.':00' : '00:00:00';
        $punchedOut = $request->check_out_time ? $request->check_out_time . ' ' . $checkOutTime : null;


        $todaysAttandance = Attandance::where('user_id', $request->user)->whereDate('created_at', Carbon::today())->first();
 
        if(!$todaysAttandance) { 
            // save role
            $attandance = Attandance::create([
                'user_id'           => $request->user,
                'punched_in'        => $punchedIn,
                'punched_in_note'   => $request->punched_in_note,
                'punched_out'       => $punchedOut,
                'punched_out_note'  => $request->punched_out_note,
                'attandance_type'   => 'manual',
                'status'            => $request->status,
            ]);


            return $this->responseWithSuccess('Attandance added successfully', $attandance);
        }

        return $this->responseWithError('Allready save attandance..', $todaysAttandance);

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
