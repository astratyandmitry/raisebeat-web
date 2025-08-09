<?php

namespace App\Filament\Support\Filters;

use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

final class DateRangeFilter
{
    public static function make($attribute = 'created_at'): Filter
    {
        return Filter::make($attribute)
            ->schema([
                DatePicker::make("{$attribute}_from"),
                DatePicker::make("{$attribute}_until")->default(now()),
            ])
            ->query(function (Builder $query, array $data) use ($attribute): Builder {
                return $query
                    ->when(
                        $data["{$attribute}_from"],
                        fn(Builder $query, $date): Builder => $query->whereDate($attribute, '>=', $date),
                    )
                    ->when(
                        $data["{$attribute}_until"],
                        fn(Builder $query, $date): Builder => $query->whereDate($attribute, '<=', $date),
                    );
            });
    }
}
