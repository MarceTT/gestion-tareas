<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TareasResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'completada' => (bool)$this->completada,
                'fecha_creacion' => $this->fecha_creacion,
                'fecha_completada' => $this->fecha_completada
            ],
            'relationships' => [
                    'id_user' => $this->user ? (string)$this->user->id : null,
                    'name_user' => $this->user ? $this->user->name : null,
                    'email_user' => $this->user ? $this->user->email : null
            ],
        ];
    }
}
