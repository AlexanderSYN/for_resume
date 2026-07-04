<?php

namespace App\Filament\Pages;

use App\Models\UserLinks;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Str;

class CreateLink extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.pages.create-link';

    protected static ?string $navigationLabel = 'Создание ссылки';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Настройки ссылок';
    protected static ?int $navigationSort = 1;

    public ?array $data = [];

   public function form(Form $form): Form
   {
       return $form
            ->schema([
                TextInput::make('original_link')
                    ->label('оригинальная ссылка')->required(),
                TextInput::make('new_link')
                    ->label('здесь будет новая ссылка')->readOnly(),
         ])
       ->statePath('data');
   }

   public function generate(): void
   {
        $data = $this->form->getState();

        $code = Str::random(6);

        UserLinks::create([
            'user_id' => auth()->id(),
            'original_link' => $data['original_link'],
            'short_code' => $code,
        ]);

        $this->form->fill([
           'original_link' => $data['original_link'],
            'new_link' => url($code),
        ]);

        Notification::make()
            ->title('Ссылка создана успешно')
            ->success()
            ->send();
   }

}
