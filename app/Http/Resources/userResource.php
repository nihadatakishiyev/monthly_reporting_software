<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class userResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id' => $this->id,
            'person_no' => $this->person_no,
            'name' => $this->name,
            'surname' => $this->surname,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'status' => $this->status,
            'position' => $this->position,
            'org_unit' => $this->org_unit,
            'type' =>$this->type,
            'education' =>$this->education,
            'email' => $this->email,
        ];
    }
}
