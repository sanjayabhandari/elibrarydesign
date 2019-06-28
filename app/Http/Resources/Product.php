<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'user' => $this->user,
            'publisher' => $this->publisher,
            'category' => $this->category,
            'language' => $this->language,
            'media' => $this->media,
            'author' => $this->author,

            'productdata' => [
                'id' => $this->id,
                'title' => $this->title,
                'description' => $this->description,
                'pop' => $this->pop,
                'py' => $this->py,
                'translator' => $this->translator,
                'illustrator' => $this->illustrator,
                'editor' => $this->editor,
                'status' => $this->status,
                'image' => $this->image


            ],
            'seodata' => [
                'link' => $this->link,
                'meta_tag' => $this->keywords,
                'metatitle' => $this->meta_title,
                'metadescription' => $this->meta_description
            ],
            'pdffile' => $this->pdffile

        ];
    }
}
