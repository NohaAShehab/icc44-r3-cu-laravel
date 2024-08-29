<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            "std_name" =>$this->name,
            "email"=>$this->email,
            "image"=> asset("images/students/".$this->image),
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
            "created_by"=>$this->creator_id,
//            "track_id"=>$this->track_id
//            "track"=> $this->track ? $this->track->name : null,
//            "owner"=>$this->creator ? $this->creator->name : null,
            "track"=>new TrackResource($this->track),
            "owner" =>new CreatorResource($this->creator)
        ];
    }
}
