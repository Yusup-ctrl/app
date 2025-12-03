<?php
namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use App\Services\BuildAdvisor;

class PcBuild extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static string $view = 'filament.pages.build-advisor';
    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public $use_case = 'gaming';
    public $budget_min;
    public $budget_max;
    public $priority = 'balance';
    public $brand = 'any';

    public $results = [];

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('use_case')
                ->label('Для чего')
                ->options([
                    'gaming' => 'Игры',
                    'work' => 'Работа (компиляция, сборки)',
                    'editing' => 'Видеомонтаж',
                    'streaming' => 'Стриминг',
                    'office' => 'Офис',
                ])
                ->reactive(),

            Forms\Components\TextInput::make('budget_max')->label('Макс. бюджет (€)')->numeric(),
            Forms\Components\Select::make('priority')->label('Приоритет')->options([
                'price'=>'Цена','balance'=>'Баланс','performance'=>'Производительность'
            ]),
            Forms\Components\Select::make('brand')->label('Предпочтение')->options([
                'any'=>'Любая','intel'=>'Intel','amd'=>'AMD','nvidia'=>'Nvidia'
            ]),
        ];
    }

    public function run()
    {
        $input = [
            'use_case' => $this->use_case,
            'budget_min' => $this->budget_min,
            'budget_max' => $this->budget_max,
            'priority' => $this->priority,
            'preferred_brand' => $this->brand,
        ];

        $this->results = PcBuild::recommend($input);
    }
}
