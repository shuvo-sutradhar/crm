<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Attandance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttandacneController extends Controller
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
     * Get todays attandacne data
     *
     * @return \Illuminate\Http\Response
     */
    public function todaysAttandance()
    {
        return Attandance::where('user_id', auth()->user()->id)->whereDate('punched_in', Carbon::today())->get();
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


        $todaysAttandance = Attandance::where('user_id', auth()->user()->id)->whereDate('punched_in', Carbon::today())->get();
        
        if(count($todaysAttandance) <= 0) { 
            // save role
            $attandance = Attandance::create([
                'user_id'           => auth()->user()->id,
                'punched_in'        => now(),
                'punched_in_note'   => $request->input('description'),
                'attandance_type'   => 'auto',
                'status'            => 'approved',
            ]);


            return $this->responseWithSuccess('Department added successfully', $attandance);
        }

        return $this->responseWithError('Opps! You are trying with bad request..');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
