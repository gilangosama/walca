<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\RelationManagers\OrdersRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\AddressRelationManager;
use Filament\Resources\Pages\ViewRecord;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;

class ViewUser extends ViewRecord implements HasTable
{
  use InteractsWithTable;

  protected static string $resource = UserResource::class;

  protected static string $view = 'filament.pages.viewUser';

  public function table(Table $table): Table
  {
    // Menampilkan address milik user yang sedang dibuka
    return $table
      ->query(fn() => $this->record->address())
      ->columns([
        Tables\Columns\TextColumn::make('address')->label('Alamat'),
        Tables\Columns\TextColumn::make('city')->label('Kota'),
        Tables\Columns\TextColumn::make('province')->label('Provinsi'),
        Tables\Columns\TextColumn::make('postal_code')->label('Kode Pos'),
      ])
      ->paginated(10)
      ->defaultSort('created_at', 'desc');
  }

  public function getRelationManagers(): array
  {
    return [
      OrdersRelationManager::class,
      AddressRelationManager::class,
    ];
  }
}
