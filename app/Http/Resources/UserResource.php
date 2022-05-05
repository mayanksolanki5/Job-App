<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'address' => $this->address,
            'number' => $this->number,
            'birthday' => $this->birthday,
            'email' => $this->email,
            'experience' => $this->experience,
            'position' => $this->position,
            'salary' => $this->salary,
            'password' => $this->password,
        ];
        // return parent::toArray($request);
    }
}
