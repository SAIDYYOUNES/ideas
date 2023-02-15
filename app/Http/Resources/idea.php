<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class idea extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            
            'id' => $this->id,
            'user_id' => $this->user_id,
            'nom' => $this->nom,
            'img1' => $this->img1,
            'img2' => $this->img2,
            'lien_fichier' => $this->lien_fichier,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
        // return parent::toArray($request);
    }
}
