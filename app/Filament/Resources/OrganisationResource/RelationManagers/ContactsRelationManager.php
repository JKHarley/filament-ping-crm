<?php

namespace App\Filament\Resources\OrganisationResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class ContactsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'contacts';

    protected static ?string $recordTitleAttribute = 'fullName';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name'),
                Forms\Components\TextInput::make('last_name'),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('phone')->tel()->required(),
                Forms\Components\TextInput::make('address')->required(),
                Forms\Components\TextInput::make('city')->required(),
                Forms\Components\TextInput::make('region')->label('County')->required(),
                Forms\Components\TextInput::make('country')->required(),
                Forms\Components\TextInput::make('postal_code')->label('Postcode')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullName'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('phone'),
            ])
            ->filters([
                //
            ]);
    }
}
