<?php

namespace App\Http\Resources;

use App\Models\AdReport;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin AdReport */
class AdReportResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'description' => $this->description,
            'status' => $this->status,
            'status_label' => AdReport::STATUS[$this->status],
            'is_active' => $this->is_active ? 'فعال' : 'غیر فعال',

            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),

            'report_type' => new ReportTypeResource($this->reportType),

            'ad' => new AdResource($this->whenLoaded('ad')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
