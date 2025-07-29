<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum MemberType: string
{
    use HasLocalizedInformation;

    case Founder = 'founder';
    case CoFounder = 'co-founder';
    case CLevel = 'c-level';
    case TeamMember = 'team_member';
    case Advisor = 'advisor';
    case Mentor = 'mentor';
}
