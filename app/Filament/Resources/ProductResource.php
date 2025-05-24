<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\{TextColumn, TagsColumn};
use Filament\Forms\Components\{TextInput, Textarea, Select, FileUpload};
use Illuminate\Support\Str;
use Filament\Infolists\Components\{TextEntry, TagsEntry, ImageEntry};
use Filament\Infolists\Infolist;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Product Management';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn(string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

            Forms\Components\TextInput::make('slug')
                ->disabled()
                ->dehydrated()
                ->required()
                ->maxLength(255)
                ->unique('products', 'slug', ignoreRecord: true),
            Textarea::make('description')->rows(3),
            TextInput::make('price')->numeric()->required(),
            TextInput::make('stock')->numeric(),
            TextInput::make('jenis')
                ->label('Variant')
                ->placeholder('Enter variants separated by commas')
                ->required()
                ->afterStateHydrated(fn($state, Forms\Set $set) => $set('jenis', is_array($state) ? implode(', ', $state) : $state))
                ->dehydrateStateUsing(
                    fn($state) =>
                    is_string($state)
                        ? array_map('trim', explode(',', $state))
                        : $state // biarkan jika sudah array
                ),
            TextInput::make('size')
                ->label('Size')
                ->placeholder('Enter size separated by commas')
                ->required()
                ->afterStateHydrated(
                    fn($state, Forms\Set $set) =>
                    $set('size', is_array($state) ? implode(', ', $state) : $state)
                )
                ->dehydrateStateUsing(
                    fn($state) =>
                    is_string($state)
                        ? array_map('trim', explode(',', $state))
                        : $state // biarkan jika sudah array
                ),

            TextInput::make('color')
                ->label('Color')
                ->placeholder('Enter color separated by commas')
                ->required()
                ->afterStateHydrated(fn($state, Forms\Set $set) => $set('jenis', is_array($state) ? implode(', ', $state) : $state))
                ->dehydrateStateUsing(
                    fn($state) =>
                    is_string($state)
                        ? array_map('trim', explode(',', $state))
                        : $state // biarkan jika sudah array
                ),
            FileUpload::make('image')
                ->label('Gambar')
                ->columnSpan('full')
                ->image()
                ->multiple()
                ->directory('product'),
            TextInput::make('weight')
                ->placeholder('Weight in grams')
                ->label('Weight')
                ->required()
                ->numeric(),

            Select::make('categories')
                ->label('Kategori')
                ->relationship('categories', 'name')
                ->multiple()
                ->preload()
                ->searchable()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('price')->money('IDR'),
            TextColumn::make('stock')->sortable(),
            TagsColumn::make('categories.name')->label('Kategori'),
        ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('name')->label('Product Name'),
            TextEntry::make('slug')->label('Slug'),
            TextEntry::make('description')->label('Description'),
            TextEntry::make('price')->label('Price')->money('IDR'),
            TextEntry::make('stock')->label('Stock'),
            TagsEntry::make('jenis')->label('Variants'),
            TextEntry::make('size')->label('Size'),
            TextEntry::make('color')->label('Color'),
            ImageEntry::make('image')->label('Image'),
            TextEntry::make('weight')->label('Weight'),
            TagsEntry::make('categories.name')->label('Categories'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
