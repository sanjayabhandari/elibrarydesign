<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Blog extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'blog_title' => $this->blog_title,
            'short_title' => $this->short_title,
            'date' => $this->date,
            'blog_description' => $this->blog_description,
            'meta_title' => $this->meta_title,
            'meta_tag' => $this->meta_tag,
            'meta_description' => $this->meta_description,
            'creator' => $this->user,
            'status' => $this->status,
            'image' => $this->image
        ];
    }
}
