<?php

namespace App\Filament\Resources\DashboardResource\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Support\Colors\Color;


class OrderChart extends ChartWidget
{
    protected static ?string $heading = 'Orders';

    protected function getData(): array
    {
        $data = Trend::model(Order::class)
        ->between(
            start: now()->subYear(),
            end: now(),
        )
        ->perMonth()
        ->count();
 
    return [
        'datasets' => [
            [
                'label' => 'Orders',
                'data' => $data->map(function (TrendValue $value) {
                    return $value->aggregate;
                }),
                'backgroundColor' => '#737373',
                'borderColor' => '#a1a1aa',
            ],
            [
                'label' => 'Completed Orders',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                'backgroundColor' => '#166534',
                'borderColor' => '#4ade80',
            ],
            [
                'label' => 'Pending Orders',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                'backgroundColor' => '#991b1b',
                'borderColor' => '#f87171',
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
