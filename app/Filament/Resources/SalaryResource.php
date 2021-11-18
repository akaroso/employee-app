<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalaryResource\Pages;
use App\Filament\Resources\SalaryResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class SalaryResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\BelongsToSelect::make('employee_id')
                ->relationship('employee', 'first_name'),
                

            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('salary'),
                Columns\Text::make('employee.first_name'),
                Columns\Text::make('from_date')->date(),
                Columns\Text::make('to_date')->date()

            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListSalaries::routeTo('/', 'index'),
            Pages\CreateSalary::routeTo('/create', 'create'),
            Pages\EditSalary::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
