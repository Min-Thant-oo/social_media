<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "email_verified_at" => $this->email_verified_at,
            "created_at" => $this->created_at->format('D, d M Y H:i:s'),

            "updated_at" => $this->updated_at->format('Y-m-d H:i:s'),
            "username" => $this->username,
            "cover_url" => Storage::url($this->cover_path),
            "avatar_url" => Storage::url($this->avatar_path),
        ];
    }
}
