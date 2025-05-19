<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use App\Models\OrderItem;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers\OrderItemsRelationManager;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Order Details')
                    ->schema([
                        Forms\Components\TextInput::make('invoice')
                            ->label('Invoice')
                            ->disabled() // Disable manual input
                            ->default(fn() => 'INV-' . now()->timestamp), // Auto-generate invoice
                        Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('status')
                            ->required(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Pricing & Shipping')
                    ->schema([
                        Forms\Components\TextInput::make('total_price')
                            ->label('Total Price')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('ongkir')
                            ->label('Shipping Cost')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('grand_total')
                            ->label('Grand Total')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('weight_total')
                            ->label('Total Weight')
                            ->numeric()
                            ->required(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Courier Information')
                    ->schema([
                        Forms\Components\TextInput::make('resi')
                            ->label('Tracking Number')
                            ->required(),
                        Forms\Components\TextInput::make('courier')
                            ->required(),
                        Forms\Components\TextInput::make('service')
                            ->label('Service Type')
                            ->required(),
                        Forms\Components\TextInput::make('estimasi_waktu')
                            ->label('Estimated Time')
                            ->required(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Order Items')
                    ->schema([
                        Forms\Components\HasManyRepeater::make('orderItems')
                            ->relationship('orderItems')
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->label('Product')
                                    ->relationship('product', 'name')
                                    ->required()
                                    ->reactive() // Make reactive to trigger changes
                                    ->afterStateUpdated(fn($state, callable $set) => $set('price', \App\Models\Product::find($state)?->price ?? 0)), // Auto-fill price
                                Forms\Components\TextInput::make('quantity')
                                    ->numeric()
                                    ->required()
                                    ->reactive() // Make reactive to trigger changes
                                    ->afterStateUpdated(fn($state, callable $set, callable $get) => $set('subtotal', $state * $get('price'))), // Calculate subtotal
                                Forms\Components\TextInput::make('price')
                                    ->numeric()
                                    ->required()
                                    ->disabled(), // Disable manual input
                                Forms\Components\TextInput::make('subtotal')
                                    ->numeric()
                                    ->required()
                                    ->disabled() // Disable manual input
                                    ->dehydrated(false) // Prevent saving to the database
                                    ->default(fn($get) => $get('quantity') * $get('price')), // Calculate subtotal
                            ])
                            ->columns(4),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('Order ID'),
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('total')->money('USD'),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            OrderItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
