<?php

namespace App\Enums;


enum BookStatus: int
{
    case reserved = 1;
    case available = 2;


    public function getLabel(): ?string
    {
        return match ($this) {
            self::reserved => "Réserver",
            self::available => "Disponible",
        };

    }
}
