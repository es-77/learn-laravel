<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public $collects = UserNewResource::class;
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
