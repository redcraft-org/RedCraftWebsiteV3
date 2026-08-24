<?php

namespace App\Filament\Resources\ShortUrls\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ShortUrlForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('source')->nullable(),
                TextInput::make('url')->url()->required(),
                TextInput::make('token')->required(),
            ]);
    }
}
