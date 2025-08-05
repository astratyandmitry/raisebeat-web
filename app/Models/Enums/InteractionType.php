<?php

declare(strict_types=1);

namespace App\Models\Enums;

enum InteractionType: string
{
    use HasLocalizedInformation;

    case RequestDemoAccess = 'request-demo-access';
    case RequestDeckAccess = 'request-deck-access';
    case ApplyForProgram = 'apply-program';
    case ProposeInvestment = 'propose-investment';
    case InviteToPitch = 'invite-to-pitch';
    case SubmitNews = 'submit-news';
    case InviteToTeam = 'invest-to-team';
}
