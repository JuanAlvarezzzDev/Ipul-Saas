<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionConceptsResource\Pages;
use App\Filament\Resources\TransactionConceptsResource\RelationManagers;
use App\Models\TransactionConcepts;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransactionConceptsResource extends Resource
{
    protected static ?string $model = TransactionConcepts::class;
    protected static ?string $tenantOwnershipRelationshipName = 'team';
    protected static ?string $tenantRelationshipName = 'transactionConcepts';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name'),
            Forms\Components\Toggle::make('active')
            ->label('Active')
            ->default(true),
            Forms\Components\TextInput::make('description'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('name')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('description')
                ->label('description')
                ->sortable()
                ->searchable(),
                Tables\Columns\ToggleColumn::make('active')
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactionConcepts::route('/'),
            'create' => Pages\CreateTransactionConcepts::route('/create'),
            'edit' => Pages\EditTransactionConcepts::route('/{record}/edit'),
        ];
    }
}
