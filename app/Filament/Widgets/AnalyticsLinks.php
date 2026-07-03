<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class AnalyticsLinks extends Widget
{
    protected string $view = 'filament.widgets.analytics-links';

    protected int | string | array $columnSpan = 'full';

    public function getViewData() : array
    {
        return [
          'totalRedirected' => 123,
        ];
    }
}
