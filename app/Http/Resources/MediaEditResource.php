<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Spatie\MediaLibrary\MediaCollections\Models\Media */
class MediaEditResource extends JsonResource
{
    /**
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => $this->type,
            'extension' => $this->extension,
            'humanReadableSize' => $this->humanReadableSize,
            'previewUrl' => $this->previewUrl,
            'originalUrl' => $this->originalUrl,
            'id' => $this->id,
            'model_id' => $this->model_id,
            'model_type' => $this->model_type,
            'uuid' => $this->uuid,
            'collection_name' => $this->collection_name,
            'name' => $this->name,
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type,
            'disk' => $this->disk,
            'conversions_disk' => $this->conversions_disk,
            'size' => $this->size,
            'manipulations' => $this->manipulations,
            'custom_properties' => $this->custom_properties,
            'generated_conversions' => $this->generated_conversions,
            'responsive_images' => $this->responsive_images,
            'order_column' => $this->order_column,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'human_readable_size' => $this->human_readable_size,
            'original_url' => $this->original_url,
            'preview_url' => $this->preview_url,
        ];
    }
}
