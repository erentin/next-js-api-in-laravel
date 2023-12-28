<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'main_title' => $this->main_title,
            'topic_title' => $this->topic_title,
            'created_at_date' => $this->created_at->format('d-m-Y'),
            'created_at_time' => $this->created_at->format('h:i'),
            'updated_at_date' => $this->updated_at->format('d-m-Y'),
            'updated_at_time' => $this->updated_at->format('h:i'),
          ];
    }
}
