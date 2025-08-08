<?php

declare(strict_types=1);

namespace App\Filament\Resources\Media;

use App\Filament\Components\Organization\BaseOrganizationResource;
use App\Filament\Resources\Media\Pages\ManageMedia;
use App\Filament\Resources\Media\Schemas\MediaForm;
use App\Filament\Resources\Media\Schemas\MediaInfolist;
use App\Filament\Resources\Media\Schemas\MediaTable;
use App\Models\Media;
use BackedEnum;

final class MediaResource extends BaseOrganizationResource
{
    protected static ?string $model = Media::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';

    protected static ?int $navigationSort = 4;

    public static function getPages(): array
    {
        return [
            'index' => ManageMedia::route('/'),
        ];
    }

    protected static function getTableColumns(): array
    {
        return MediaTable::columns();
    }

    protected static function getTableFilters(): array
    {
        return MediaTable::filters();
    }

    protected static function getInfolistComponents(): array
    {
        return MediaInfolist::entries();
    }

    protected static function getFromComponents(): array
    {
        return MediaForm::fields();
    }
}
