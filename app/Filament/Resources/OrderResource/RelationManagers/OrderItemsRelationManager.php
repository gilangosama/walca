<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

class OrderItemsRelationManager extends RelationManager
{
  protected static string $relationship = 'orderItems';

  protected static ?string $recordTitleAttribute = 'product.name';

  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Card::make()
          ->schema([
            Forms\Components\Select::make('product_id')
              ->label('Product')
              ->relationship('product', 'name')
              ->required(),
            Forms\Components\TextInput::make('quantity')
              ->numeric()
              ->required(),
            Forms\Components\TextInput::make('price')
              ->numeric()
              ->required(),
            Forms\Components\TextInput::make('subtotal')
              ->numeric()
              ->required(),
          ])
          ->columns(2),
      ]);
  }

  public function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('product.name')->label('Product'),
        Tables\Columns\TextColumn::make('quantity'),
        Tables\Columns\TextColumn::make('price')->money('USD'),
        Tables\Columns\TextColumn::make('subtotal')->money('USD'), // Added subtotal
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
