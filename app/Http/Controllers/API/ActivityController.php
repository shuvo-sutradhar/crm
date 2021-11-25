<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use App\Http\Resources\ActivityResource;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ActivityResource::collection(Activity::latest()->paginate(10));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Activity::where('id',$id)->delete();
    }



    /**
     * clear all activity log
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {

        $result = Activity::truncate();
        
        // CREATIVE ACTIVITY LOG
        activity()
            ->causedBy(auth()->user())
            ->withProperties(['customProperty' => 'customValue'])
            ->log("All activity log has been deleted by <strong>{auth()->user()}</strong>");
        return $this->responseWithSuccess('All activity log has been deleted', $result);

    }

}
