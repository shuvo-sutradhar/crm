<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Attandance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MyDeskResource;

class MyDeskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MyDeskResource::collection(Attandance::where('user_id', auth()->user()->id)->latest()->paginate(26));
    }



    /**
     * Get todays attandacne data
     *
     * @return \Illuminate\Http\Response
     */
    public function todaysAttandance()
    {
        return Attandance::where('user_id', auth()->user()->id)->whereDate('attandance_for', Carbon::today())->first();
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function punchIn(Request $request)
    {   
    
        $this->validate($request, [
            'description'       =>  'nullable|min:3|max:500',
        ]);


        $todaysAttandance = Attandance::where('user_id', auth()->user()->id)->whereDate('attandance_for', Carbon::today())->first();

        if(!$todaysAttandance) { 

            // save role
            $attandance = Attandance::create([
                'user_id'           => auth()->user()->id,
                'punched_in'        => Carbon::now(),
                'punched_in_note'   => $request->input('description'),
                'attandance_type'   => 'auto',
                'status'            => 'present',
                'attandance_for'    => Carbon::now(),
            ]);
            return $this->responseWithSuccess('Punched in successfully', $attandance);
        }

        return $this->responseWithError('Opps! You are trying with bad request..');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function punchOut(Request $request)
    {   
    
        

        $todayPunchOut = Attandance::where('user_id', auth()->user()->id)->whereDate('attandance_for', Carbon::today())->first();


        $this->validate($request, [
            'description'       =>  'nullable|min:3|max:500',
        ]);

        //if($request->ip() == '103.199.168.9') { 
            $todayPunchOut->punched_out = Carbon::now();
            $todayPunchOut->punched_out_note = $request->punched_out_note;
            $todayPunchOut->save();

            return $this->responseWithSuccess('Punch out successfully');
        //}

        //return $this->responseWithError('Opps! You are trying with bad request..');
    }


    // search 
    public function search($data) {

        $request = json_decode($data);

        return MyDeskResource::collection(Attandance::where(function($query) use ($request) {
            $query->whereBetween('attandance_for', [$request->form, Carbon::parse($request->to)->addDays(1)]);
        })
        ->where('user_id', auth()->user()->id)
        ->latest()
        ->paginate(10));

   

    }
    
}
