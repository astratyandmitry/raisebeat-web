<?php

namespace App\Models\Enums;

use App\Support\Traits\HasLocalizedInformation;

enum Timezone: string
{
    use HasLocalizedInformation;

    case UTC_MINUS_12_00 = 'UTC-12:00';
    case UTC_MINUS_11_00 = 'UTC-11:00';
    case UTC_MINUS_10_00 = 'UTC-10:00';
    case UTC_MINUS_09_30 = 'UTC-09:30';
    case UTC_MINUS_09_00 = 'UTC-09:00';
    case UTC_MINUS_08_00 = 'UTC-08:00';
    case UTC_MINUS_07_00 = 'UTC-07:00';
    case UTC_MINUS_06_00 = 'UTC-06:00';
    case UTC_MINUS_05_00 = 'UTC-05:00';
    case UTC_MINUS_04_00 = 'UTC-04:00';
    case UTC_MINUS_03_30 = 'UTC-03:30';
    case UTC_MINUS_03_00 = 'UTC-03:00';
    case UTC_MINUS_02_00 = 'UTC-02:00';
    case UTC_MINUS_01_00 = 'UTC-01:00';
    case UTC_00_00 = 'UTC+00:00';
    case UTC_PLUS_01_00 = 'UTC+01:00';
    case UTC_PLUS_02_00 = 'UTC+02:00';
    case UTC_PLUS_03_00 = 'UTC+03:00';
    case UTC_PLUS_03_30 = 'UTC+03:30';
    case UTC_PLUS_04_00 = 'UTC+04:00';
    case UTC_PLUS_04_30 = 'UTC+04:30';
    case UTC_PLUS_05_00 = 'UTC+05:00';
    case UTC_PLUS_05_30 = 'UTC+05:30';
    case UTC_PLUS_05_45 = 'UTC+05:45';
    case UTC_PLUS_06_00 = 'UTC+06:00';
    case UTC_PLUS_06_30 = 'UTC+06:30';
    case UTC_PLUS_07_00 = 'UTC+07:00';
    case UTC_PLUS_08_00 = 'UTC+08:00';
    case UTC_PLUS_08_45 = 'UTC+08:45';
    case UTC_PLUS_09_00 = 'UTC+09:00';
    case UTC_PLUS_09_30 = 'UTC+09:30';
    case UTC_PLUS_10_00 = 'UTC+10:00';
    case UTC_PLUS_10_30 = 'UTC+10:30';
    case UTC_PLUS_11_00 = 'UTC+11:00';
    case UTC_PLUS_12_00 = 'UTC+12:00';
    case UTC_PLUS_12_45 = 'UTC+12:45';
    case UTC_PLUS_13_00 = 'UTC+13:00';
    case UTC_PLUS_14_00 = 'UTC+14:00';
}
