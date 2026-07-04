<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use App\Models\UserLinks;

class AllLinksUser extends Page implements HasTable
{
    use InteractsWithTable;

    protected static string $view = 'filament.pages.analytic-links-pages';
    protected static ?string $navigationLabel = "ваши ссылки";
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Настройки ссылок';
    protected static ?int $navigationSort = 1;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                UserLinks::query()
                    ->where('user_id', auth()->id())
                    ->withCount('visits')
            )
            ->columns([
                TextColumn::make('original_link')
                    ->label('Оригинальная ссылка')
                    ->limit(40)
                    ->copyable(),

                TextColumn::make('short_code')
                    ->label('Код'),

                TextColumn::make('visits_count')
                    ->label('Переходов'),
            ])
            ->actions([
                Action::make('statistics')
                    ->label('Статистика')
                    ->icon('heroicon-o-chart-bar')
                    ->url(fn (UserLinks $record) => LinkStatistics::getUrl([
                        'link' => $record->id
                    ])),
                DeleteAction::make()
                    ->label('Удалить'),
            ]);
    }
}
