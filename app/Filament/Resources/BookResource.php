<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Category_book;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        TextInput::make('name')->label('Name')->required(),
                        TextInput::make('rate')
                            ->label('Rate')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5)
                            ->required(),
                        TextInput::make('writer')->label('Writer')->required(),
                        Select::make('category_book_id')
                            ->label('Category')
                            ->relationship('categoryBook', 'category_Name')
                            ->options(Category_book::all()->pluck('category_Name', 'id'))
                            ->searchable()
                            ->required(),
                        TextInput::make('language')->label('Language')->required(),
                        Textarea::make('description')->label('Description')->required(),
                        FileUpload::make('path')
                            ->label('PDF')
                            ->directory('books')
                            ->disk('public')
                            ->acceptedFileTypes(['application/pdf'])
                            ->required(),

                        FileUpload::make('cover_Img')
                            ->label('Cover')
                            ->image()
                            ->directory('img')
                            ->disk('public')
                            ->required(),
                    ]),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('writer'),
                TextColumn::make('rate'),
                TextColumn::make('category.category_Name'),
                TextColumn::make('language'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
