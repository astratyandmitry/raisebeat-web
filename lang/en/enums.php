<?php

use App\Models\Enums\BusinessModel;
use App\Models\Enums\FundraisingRound;
use App\Models\Enums\FundraisingStatus;
use App\Models\Enums\InteractionStatus;
use App\Models\Enums\InvestmentModel;
use App\Models\Enums\VacancyType;
use App\Models\Enums\Language;
use App\Models\Enums\Country;
use App\Models\Enums\MemberType;
use App\Models\Enums\MetricType;
use App\Models\Enums\MediaType;
use App\Models\Enums\PostType;
use App\Models\Enums\Region;
use App\Models\Enums\StartupStage;
use App\Models\Enums\TeamSize;
use App\Models\Enums\Timezone;
use App\Models\Enums\VerificationStatus;

return [
    Language::class => [
        Language::Russian->value => 'Russian',
        Language::English->value => 'English',
    ],

    Country::class => [
        Country::Armenia->value => 'Armenia',
        Country::Azerbaijan->value => 'Azerbaijan',
        Country::Belarus->value => 'Belarus',
        Country::Georgia->value => 'Georgia',
        Country::Kazakhstan->value => 'Kazakhstan',
        Country::Kyrgyzstan->value => 'Kyrgyzstan',
        Country::Russia->value => 'Russia',
        Country::Tajikistan->value => 'Tajikistan',
        Country::Turkmenistan->value => 'Turkmenistan',
        Country::Ukraine->value => 'Ukraine',
        Country::Uzbekistan->value => 'Uzbekistan',
    ],

    Region::class => [
        Region::CIS->value => 'CIS',
        Region::MENA->value => 'MENA',
        Region::CentralAsia->value => 'Central Asia',
        Region::Europe->value => 'Europe',
        Region::Global->value => 'Global',
    ],

    Timezone::class => [
        Timezone::UTC_MINUS_12_00->value => 'UTC−12:00 — Baker Island, Howland Island (USA)',
        Timezone::UTC_MINUS_11_00->value => 'UTC−11:00 — Niue, American Samoa',
        Timezone::UTC_MINUS_10_00->value => 'UTC−10:00 — Honolulu, Tahiti',
        Timezone::UTC_MINUS_09_30->value => 'UTC−09:30 — Marquesas Islands',
        Timezone::UTC_MINUS_09_00->value => 'UTC−09:00 — Alaska, Gambier Islands',
        Timezone::UTC_MINUS_08_00->value => 'UTC−08:00 — Los Angeles, Vancouver',
        Timezone::UTC_MINUS_07_00->value => 'UTC−07:00 — Denver, Phoenix',
        Timezone::UTC_MINUS_06_00->value => 'UTC−06:00 — Mexico City, Central America',
        Timezone::UTC_MINUS_05_00->value => 'UTC−05:00 — New York, Toronto, Lima',
        Timezone::UTC_MINUS_04_00->value => 'UTC−04:00 — Caracas, Santiago',
        Timezone::UTC_MINUS_03_30->value => 'UTC−03:30 — Newfoundland',
        Timezone::UTC_MINUS_03_00->value => 'UTC−03:00 — Buenos Aires, Brasília',
        Timezone::UTC_MINUS_02_00->value => 'UTC−02:00 — South Georgia',
        Timezone::UTC_MINUS_01_00->value => 'UTC−01:00 — Azores, Cape Verde',
        Timezone::UTC_00_00->value => 'UTC±00:00 — London, Lisbon, Casablanca',
        Timezone::UTC_PLUS_01_00->value => 'UTC+01:00 — Paris, Berlin, Rome, Madrid',
        Timezone::UTC_PLUS_02_00->value => 'UTC+02:00 — Athens, Kyiv, Cape Town, Helsinki',
        Timezone::UTC_PLUS_03_00->value => 'UTC+03:00 — Moscow, Baghdad, Nairobi, St. Petersburg',
        Timezone::UTC_PLUS_03_30->value => 'UTC+03:30 — Tehran',
        Timezone::UTC_PLUS_04_00->value => 'UTC+04:00 — Dubai, Baku, Samara',
        Timezone::UTC_PLUS_04_30->value => 'UTC+04:30 — Kabul',
        Timezone::UTC_PLUS_05_00->value => 'UTC+05:00 — Almaty, Islamabad, Yekaterinburg',
        Timezone::UTC_PLUS_05_30->value => 'UTC+05:30 — Mumbai, Delhi, Colombo',
        Timezone::UTC_PLUS_05_45->value => 'UTC+05:45 — Kathmandu',
        Timezone::UTC_PLUS_06_00->value => 'UTC+06:00 — Bangladesh, Bishkek',
        Timezone::UTC_PLUS_06_30->value => 'UTC+06:30 — Yangon, Cocos Islands',
        Timezone::UTC_PLUS_07_00->value => 'UTC+07:00 — Bangkok, Jakarta, Ho Chi Minh City',
        Timezone::UTC_PLUS_08_00->value => 'UTC+08:00 — Beijing, Singapore, Perth',
        Timezone::UTC_PLUS_08_45->value => 'UTC+08:45 — Eucla (Australia)',
        Timezone::UTC_PLUS_09_00->value => 'UTC+09:00 — Tokyo, Seoul, Yakutsk',
        Timezone::UTC_PLUS_09_30->value => 'UTC+09:30 — Adelaide, Darwin',
        Timezone::UTC_PLUS_10_00->value => 'UTC+10:00 — Sydney, Vladivostok, Guam',
        Timezone::UTC_PLUS_10_30->value => 'UTC+10:30 — Lord Howe Island',
        Timezone::UTC_PLUS_11_00->value => 'UTC+11:00 — Magadan, Solomon Islands',
        Timezone::UTC_PLUS_12_00->value => 'UTC+12:00 — Fiji, Kamchatka, New Zealand',
        Timezone::UTC_PLUS_12_45->value => 'UTC+12:45 — Chatham Islands (New Zealand)',
        Timezone::UTC_PLUS_13_00->value => 'UTC+13:00 — Samoa, Tonga',
        Timezone::UTC_PLUS_14_00->value => 'UTC+14:00 — Line Islands (Kiribati)',
    ],

    StartupStage::class => [
        StartupStage::Idea->value => 'Idea',
        StartupStage::MVP->value => 'MVP',
        StartupStage::Traction->value => 'Traction',
        StartupStage::Revenue->value => 'Revenue',
        StartupStage::Growth->value => 'Growth',
        StartupStage::Scale->value => 'Scale',
    ],

    FundraisingRound::class => [
        FundraisingRound::PreSeed->value => 'Pre-Seed',
        FundraisingRound::Seed->value => 'Seed',
        FundraisingRound::SeriesA->value => 'Series A',
        FundraisingRound::SeriesB->value => 'Series B',
        FundraisingRound::Bridge->value => 'Bridge',
        FundraisingRound::Grant->value => 'Grant',
    ],

    FundraisingStatus::class => [
        FundraisingStatus::NotRaising->value => 'Not Raising',
        FundraisingStatus::Active->value => 'Active',
        FundraisingStatus::SoftCommit->value => 'Soft Commit',
        FundraisingStatus::Closed->value => 'Closed',
    ],

    InvestmentModel::class => [
        InvestmentModel::Equity->value => 'Equity',
        InvestmentModel::Revenue->value => 'Revenue',
        InvestmentModel::Safe->value => 'Safe',
        InvestmentModel::Convertible->value => 'Convertible',
        InvestmentModel::Grant->value => 'Grant',
        InvestmentModel::Debt->value => 'Debt',
    ],

    BusinessModel::class => [
        BusinessModel::Subscription->value => 'Subscription',
        BusinessModel::TransactionFee->value => 'Transaction Fee',
        BusinessModel::Freemium->value => 'Freemium',
        BusinessModel::Licensing->value => 'Licensing',
        BusinessModel::Ads->value => 'Ads',
    ],

    InteractionStatus::class => [
        InteractionStatus::Pending->value => 'Pending',
        InteractionStatus::Approved->value => 'Approved',
        InteractionStatus::Rejected->value => 'Rejected',
        InteractionStatus::Cancelled->value => 'Cancelled',
    ],

    TeamSize::class => [
        TeamSize::PEOPLE_1_3->value => '1-3',
        TeamSize::PEOPLE_4_10->value => '4-10',
        TeamSize::PEOPLE_11_20->value => '11-20',
        TeamSize::PEOPLE_21_50->value => '21-50',
        TeamSize::PEOPLE_50_100->value => '50-100',
        TeamSize::PEOPLE_100_plus->value => '100+',
    ],

    MemberType::class => [
        MemberType::Founder->value => 'Founder',
        MemberType::CoFounder->value => 'Co-Founder',
        MemberType::CLevel->value => 'C-Level',
        MemberType::TeamMember->value => 'Team Member',
        MemberType::Advisor->value => 'Advisor',
        MemberType::Mentor->value => 'Mentor',
    ],

    MetricType::class => [
        MetricType::MRR->value => 'Monthly Recurring Revenue',
        MetricType::ARPU->value => 'Average Revenue Per User',
        MetricType::CAC->value => 'Customer Acquisition Cost',
        MetricType::LTV->value => 'Customer Lifetime Value',
        MetricType::DAU->value => 'Daily Active Users',
        MetricType::MAU->value => 'Monthly Active Users',
        MetricType::CHURN->value => 'Churn Rate',
    ],

    VacancyType::class => [
        VacancyType::CoFounder->value => 'Co-Founder',
        VacancyType::FullTime->value => 'Full-time',
        VacancyType::PartTime->value => 'Part-time',
        VacancyType::Freelance->value => 'Freelance',
    ],

    MediaType::class => [
        MediaType::NewsSite->value => 'News site',
        MediaType::Blog->value => 'Blog',
        MediaType::Podcast->value => 'Podcast',
        MediaType::Youtube->value => 'YouTube',
        MediaType::Telegram->value => 'Telegram',
        MediaType::Community->value => 'Community',
    ],

    PostType::class => [
        PostType::InvestorUpdate->value => 'Investor Update',
        PostType::Update->value => 'Update',
        PostType::Milestone->value => 'Milestone',
        PostType::Announcement->value => 'Announcement',
        PostType::Hiring->value => 'Hiring',
        PostType::MediaMention->value => 'Media Mention',
        PostType::Commentary->value => 'Commentary',
    ],

    VerificationStatus::class => [
        VerificationStatus::PENDING->value => 'Pending',
        VerificationStatus::ACCEPTED->value => 'Accepted',
        VerificationStatus::REJECTED->value => 'Rejected',
    ],
];
