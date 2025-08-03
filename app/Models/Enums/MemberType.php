<?php

declare(strict_types=1);

namespace App\Models\Enums;

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
