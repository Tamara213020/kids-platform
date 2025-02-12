<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LeaderBoard extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::query()->withCount('badges')
                    ->orderBy('badges_count', 'desc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('resources.fields.name')),
                Tables\Columns\TextColumn::make('badges_count')->label(__('resources.fields.score')),
            ])
            ->paginated([5, 10]);
    }
}
