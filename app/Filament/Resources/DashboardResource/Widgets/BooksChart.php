<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use App\Models\Book;
use Filament\Widgets\ChartWidget;
use App\Models\Treatment;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class BooksChart extends ChartWidget
{
    protected static ?string $heading = 'Books';

    protected function getData(): array
    {
        $data = Trend::model(Book::class)
        ->between(
            start: now()->subYear(),
            end: now(),
        )
        ->perMonth()
        ->count();
 
    return [
        'datasets' => [
            [
                'label' => 'Books',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
            [
                'label' => 'Active Books',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
