<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AddressRelationManager extends RelationManager
{
  protected static string $relationship = 'address';

  public function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('full_address')
          ->label('Address')
          ->getStateUsing(fn($record) => "{$record->street}, {$record->district}"),
        Tables\Columns\TextColumn::make('regency')->label('City/Regency'),
        Tables\Columns\TextColumn::make('province')->label('Province'),
        Tables\Columns\TextColumn::make('postal_code')->label('Postal Code'),
      ])
      ->filters([
        //
      ]);
  }
}
