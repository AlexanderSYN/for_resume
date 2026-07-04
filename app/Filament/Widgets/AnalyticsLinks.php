<?php

namespace App\Filament\Widgets;

use App\Models\LinkVisit;
use Filament\Widgets\Widget;

class AnalyticsLinks extends Widget
{
    protected static string $view = 'filament.widgets.analytics-links';

    protected int | string | array $columnSpan = 'full';

    public function getViewData() : array
    {
        $userId = auth()->id();

        return [
            'totalRedirected' => LinkVisit::whereHas('link', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })->count(),
        ];
    }
}
