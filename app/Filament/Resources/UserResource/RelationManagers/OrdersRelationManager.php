<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class OrdersRelationManager extends RelationManager
{
  protected static string $relationship = 'orders';

  public function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('id')->sortable(),
        Tables\Columns\TextColumn::make('created_at')->dateTime('d-m-Y H:i'),
        Tables\Columns\TextColumn::make('status'),
        // Tambahkan kolom lain sesuai kebutuhan
      ])
      ->filters([
        //
      ]);
  }
}
