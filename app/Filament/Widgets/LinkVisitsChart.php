<?php

namespace App\Filament\Widgets;

use App\Models\LinkVisit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class LinkVisitsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $userId = auth()->id();

        $visits = LinkVisit::whereHas('link', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })
            ->select(
                DB::raw('DATE(created_at) as day'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Переходы',
                    'data' => $visits->pluck('total')->toArray(),
                ],
            ],
            'labels' => $visits->pluck('day')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
