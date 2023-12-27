<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    // public $preserveKeys = true;

    // "1": {
    //     "id": 1,
    //     "name": "Mike Wolff",
    //     "email": "eliezer41@example.org"
    // }


    // public static $wrap = 'user';

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            // 'email' => $this->when($this->id == 1, $this->email),
            // 'email' => $this->when($this->email, $this->email),
            'extra' => $this->mergeWhen($this->id == 1, [
                1, 2, 3, 4, 5, 6
            ]),
            'email' => $this->whenNotNull($this->email),
            "orders" => OrderResource::collection($this->whenLoaded('orders'))
        ];
    }
}
