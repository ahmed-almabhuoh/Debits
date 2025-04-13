<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReceiptsRelationManager extends RelationManager
{
    protected static string $relationship = 'receipts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Forms\Components\Select::make('currency')
                    ->options(array_combine(
                        Setting::getSupportedCurrencies(),
                        Setting::getSupportedCurrencies()
                    ))
                    ->required()
                    ->default(Setting::getDefaultCurrency()),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('receipt_date')
                    ->required(),
                Forms\Components\Select::make('payment_method')
                    ->options([
                        'cash' => 'Cash',
                        'credit_card' => 'Credit Card',
                        'bank_transfer' => 'Bank Transfer',
                        'other' => 'Other',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('reference_number')
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('amount')
            ->columns([
                Tables\Columns\TextColumn::make('amount')
                    ->formatStateUsing(fn($state, $record) => number_format($state, 2) . ' ' . $record->currency),
                Tables\Columns\TextColumn::make('currency'),
                Tables\Columns\TextColumn::make('receipt_date')
                    ->date(),
                Tables\Columns\TextColumn::make('payment_method'),
                Tables\Columns\TextColumn::make('reference_number'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
