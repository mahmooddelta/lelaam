<?php

namespace App\Http\Resources;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Maize\Markable\Models\Bookmark */
class BookmarkResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->when($this->name, $this->name),
            'ad' => $this->when($this->markable_id, new AdResource(Ad::find($this->markable_id))),
        ];
    }
}
