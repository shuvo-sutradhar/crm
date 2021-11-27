<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MyDeskResource extends JsonResource
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
            'punched_in'            => $this->punched_in,
            'punched_in_status'      => $this->punchedInStatus(),
            'punched_in_note'       => $this->punched_in_note,
            'punched_out'           => $this->punchedOut(),
            'punched_out_status'    => $this->punchedOutStatus(),
            'punched_out_note'      => $this->punched_out_note,
            'total_hours'           => $this->duration(),
            'attandance_type'       => $this->attandance_type,
            'status'                => $this->status,
            'created_at'            => $this->created_at,
        ];
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
            return '----';
        }
    }


    public function punchedOut() {
        if($this->punched_in && $this->punched_out == null) {
            return 'Not yet';
        } else if($this->punched_in && $this->punched_out) {
            return $this->punched_out;
        } else{
            return '-----';
        }
    }

    // check punched In status
    public function punchedInStatus() {
        return Carbon::today();
        // if(Carbon::parse($this->punched_in)->format('h:i:s') > '10:16:00') {
        //     return 'late';
        // } if (Carbon::parse($this->punched_in)->format('h:i:s') < '09:55:00') {
        //     return 'early';
        // } else {
        //     return 'in_time';
        // }
    }

    // check punched In status
    public function punchedOutStatus() {
        if(Carbon::parse($this->punched_out)->format('h:i:s') < '07:00:00') {
            return 'early';
        } else{
            return 'in_time';
        }
    }

    public function attandanceStatus() {
        if(Carbon::parse($this->punched_in)->format('h:i:s') > '10:16:00') {
            return 'Already late';
        } if (Carbon::parse($this->punched_in)->format('h:i:s') < '09:55:00') {
            return 'Early';
        } else {
            return 'In time';
        }
    }
}

