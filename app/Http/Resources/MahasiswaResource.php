<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
    return [
        'id' => $this->id,
        'nama' => $this->nama,
        'nim' => $this->nim,
        'prodi' => $this->prodi,
        'angkatan' => $this->angkatan,
        'ipk' => (float) $this->ipk,
        'email' => $this->email,
        'bio' => $this->bio,
    ];
    }
}
