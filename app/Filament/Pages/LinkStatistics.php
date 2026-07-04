<?php

namespace App\Filament\Pages;

use App\Models\LinkVisit;
use Filament\Pages\Page;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Models\UserLinks;
use Filament\Facades\Filament;

class LinkStatistics extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationLabel = 'Статистика Ссылки';
    protected static string $view = 'filament.pages.link-statistics';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $slug = 'link-statistics/{link}';

    public UserLinks $link;

    public function mount(UserLinks $link): void
    {
        $this->link = $link;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                LinkVisit::query()
                    ->where('user_link_id', $this->link->id)
            )
            ->columns([
                TextColumn::make('ip_address')
                    ->label('ip-адресс')
                    ->alignCenter(),
                TextColumn::make('created_at')
                    ->label('дата и время перехода')
                    ->alignCenter(),
            ])
            ->paginated(false);
    }

}
