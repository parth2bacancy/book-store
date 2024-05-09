<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use App\Models\Book;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Tables\Columns\Layout\Split;


class BookStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', Book::query()->count()),
            Stat::make('Active Books', Book::query()->where('active', true)->count()),
            Stat::make('Inactive Books', Book::query()->where('active', false)->count()),
        ];
    }
}
