<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IdentificationResource\Pages;
use App\Filament\Resources\IdentificationResource\RelationManagers;
use App\Models\Identification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IdentificationResource extends Resource
{
    protected static ?string $model = Identification::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('issue_date'),
                Forms\Components\DatePicker::make('expiry_date'),
                Forms\Components\TextInput::make('issuing_authority')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->sortable(),
                Tables\Columns\TextColumn::make('type')->searchable(),
                Tables\Columns\TextColumn::make('number')->searchable(),
                Tables\Columns\TextColumn::make('issue_date')->date(),
                Tables\Columns\TextColumn::make('expiry_date')->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIdentifications::route('/'),
            'create' => Pages\CreateIdentification::route('/create'),
            'edit' => Pages\EditIdentification::route('/{record}/edit'),
        ];
    }
}
