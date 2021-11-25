<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'name'          => $this->name,
            'email'         => $this->email,
            'account_role'  => $this->account_role,
            'phone'         => $this->phone,
            "profile_photo" => $this->profile_photo,
            "photo_url"     => $this->photo_url,
            'last_login_at' => $this->last_login_at,
            'role'          => $this->roles->map(function ($role) {
                                return collect($role)
                                    ->only(['name', 'slug'])
                                    ->all();
                            }),
            'created_at'    => $this->created_at,
            'slug'          => $this->slug,
        ];
    }
}
