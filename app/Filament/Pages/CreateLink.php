<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Actions\Action;

class CreateLink extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.create-link';

    protected static ?string $navigationLabel = 'Создание ссылки';
    protected static string|null|\BackedEnum $navigationIcon = 'heroicon-o-document-text';
    protected static string|null|\UnitEnum $navigationGroup = 'Настройки ссылок';
    protected static ?int $navigationSort = 1;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form)
    {
        return $form
            ->schema([
               TextInput::make('original_link')
                    ->label('оригинальная ссылка')
                    ->required(),
                TextInput::make('new_link')
                    ->label('новая ссылка')
                    ->required()
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Сгенерировать')
                ->submit('generate'),
        ];
    }

    public function save(): void
    {
        $state = $this->form->getState();

        \Filament\Notifications\Notification::make()
            ->title('Успешно сгенерирована')
            ->success()
            ->send();
    }


}
