<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class AttandanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id'                    => $this->id,
            'user'                  => $this->getUser(),
            'punched_in'            => $this->punched_in,
            'punched_in_status'     => $this->punchedInStatus(),
            'punched_in_note'       => $this->punched_in_note,
            'punched_out'           => $this->punchedOut(),
            'punched_out_status'    => $this->punchedOutStatus(),
            'punched_out_note'      => $this->punched_out_note,
            'total_hours'           => $this->duration(),
            'attandance_type'       => $this->attandance_type,
            'status'                => $this->status,
            'created_at'            => $this->created_at,
            'attandance_for'        => $this->attandance_for,
        ];
    }

    public function getUser() {
        return User::select('id','name')->where('id', $this->user_id)->first();
    }

    
    public function duration(){
        if($this->punched_in && $this->punched_out) {

            $t1 = Carbon::parse($this->punched_in);
            $t2 = Carbon::parse($this->punched_out);
            $diff = $t1->diff($t2);
            $hours = strlen($diff->h) == 1 ? 0 . $diff->h : $diff->h;
            $minutes = strlen($diff->i) == 1 ? 0 . $diff->i : $diff->i;
            
            return $hours . ':' . $minutes;
        } else {
            return null;
        }
    }


    public function punchedOut() {
        if($this->punched_in && $this->punched_out == null) {
            return null;
        } else if($this->punched_in && $this->punched_out) {
            return $this->punched_out;
        } else{
            return null;
        }
    }

    // check punched In status
    public function punchedInStatus() {

        $today = date('Y-m-d');
        $entryTime = Carbon::parse($this->punched_in);
        $earlyEntry = Carbon::parse($today. ' 09:55:00');
        $lateEntry = Carbon::parse($today. ' 10:15:00');

        $earlyTimeDiff = Carbon::parse($entryTime)->diffInMinutes($earlyEntry, false);
        $lateTimeDiff = Carbon::parse($entryTime)->diffInMinutes($lateEntry, false);

        $entryType = null;
        if($lateTimeDiff >= 0 && $earlyTimeDiff <= 0){
            $entryType  = 'in_time';
        }else if($lateTimeDiff <= 0 && $earlyTimeDiff <= 0){
            $entryType  = 'late';
        }else{
            $entryType  = 'early entry';
        }
        return $entryType;
        
    }

    // check punched In status
    public function punchedOutStatus() {

        $today = date('Y-m-d');
        $entryTime = Carbon::parse($this->punched_out);
        $lastEntryTime = Carbon::parse($today. ' 19:00:00');
        $timeDiff = Carbon::parse($entryTime)->diffInMinutes($lastEntryTime, false);

        if($timeDiff > 0){
            $entryType  = 'early';
        }else{
            $entryType  = 'in_time';
        }
        return $entryType;

    }

}
