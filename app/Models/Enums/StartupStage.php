<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

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
