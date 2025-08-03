<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum StartupStage: string
{
    use HasLocalizedInformation;

    case Idea = 'idea';
    case MVP = 'mvp';
    case Traction = 'traction';
    case Revenue = 'revenue';
    case Growth = 'growth';
    case Scale = 'scale';
}
