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

        $checkInTime = $request->check_in_date && $request->check_in_time ? $request->check_in_time.':00' : '00:00:00';
        $punchedIn = $request->check_in_date ? $request->check_in_date . ' ' . $checkInTime : null;

        $checkOutTime = $request->check_out_date && $request->check_out_time ? $request->check_out_time.':00' : '00:00:00';
        $punchedOut = $request->check_out_date ? $request->check_out_date . ' ' . $checkOutTime : null;


        $todaysAttandance = Attandance::where('user_id', $request->user)->whereDate('attandance_for', Carbon::today())->first();
 
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
                'attandance_for'    => $punchedIn ? $punchedIn : Carbon::now(),
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
        return Attandance::where('id', $id)->first();
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
        $attandance = Attandance::where('id', $id)->first();

        
        $this->validate($request, [
            'user'              =>  'required',
            'check_in_date'     =>  'required_if:status,present',
            'check_in_time'     =>  'required_if:status,present',
            'status'            =>  'required',
        ]);


        if($attandance) { 

            $checkInTime = $request->check_in_date && $request->check_in_time ? $request->check_in_time.':00' : '00:00:00';
            $punchedIn = $request->check_in_date ? $request->check_in_date . ' ' . $checkInTime : null;
    
            $checkOutTime = $request->check_out_date && $request->check_out_time ? $request->check_out_time.':00' : '00:00:00';
            $punchedOut = $request->check_out_date ? $request->check_out_date . ' ' . $checkOutTime : null;


            // update attandacne
            $attandance->user_id = $request->user;
            $attandance->punched_in = $punchedIn;
            $attandance->punched_in_note = $request->punched_in_note;
            $attandance->punched_out       = $punchedOut;
            $attandance->punched_out_note  = $request->punched_out_note;
            $attandance->attandance_type   = 'manual';
            $attandance->status            = $request->status;
            $attandance->save();

            return $this->responseWithSuccess('Attandance added successfully', $attandance);
        }

        return $this->responseWithError('Sorry no record found..', $attandance);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attandance = Attandance::where('id', $id)->first()->delete();
        return $this->responseWithSuccess('Attandance deleted successfully');
    }



    // search 
    public function search($data) {

        $request = json_decode($data);

        if($request->form) {
            return AttandanceResource::collection(Attandance::where(function($query) use ($request) {
                $query->where('user_id', 'like', '%' . $request->user . '%');
                $query->whereBetween('attandance_for', [$request->form, Carbon::parse($request->to)->addDays(1) ]);
            })
            ->latest()
            ->paginate(10));
        } else {
            return AttandanceResource::collection(Attandance::where(function($query) use ($request) {
                $query->where('user_id', 'like', '%' . $request->user . '%');
            })
            ->latest()
            ->paginate(10));
        }

    }
}
