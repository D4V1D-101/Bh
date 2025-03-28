<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Games;
use App\Models\Genres;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ServiceResource\Pages;

class ServiceResource extends Resource
{
    protected static ?string $model = Games::class;
    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('short_desc')
                    ->label('Short Description')
                    ->required()
                    ->maxLength(35)
                    ->helperText('Max 35 characters'),
                TextInput::make('exe_name')->label('Exe Name')->columnSpan(2)->required(),
                RichEditor::make('description')
                    ->required()
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike', 'bulletList', 'h2', 'h3',
                        'orderedList', 'heading', 'blockquote', 'undo', 'redo',
                        'codeBlock', 'align',
                    ])->columnSpan(2),
                DatePicker::make('release_date')->format('Y/m/d')->label('Release Date')->columnSpan(2)->required(),
                TextInput::make('download_link')->url()->label('Download Link')->placeholder('Enter URL')->columnSpan(2),
                TextInput::make('image_path')->url()->label('Image Path')->placeholder('Enter URL')->columnSpan(2)->rules(['required','url','ends_with:.jpg,.jpeg,.png'])
                ->validationMessages(['ends_with' => 'The URL must ends with jpg / jpeg /png']),
                Select::make('publisher_id')
                    ->label('Publisher')
                    ->relationship('publisher', 'name')
                    ->required(),
                Select::make('developer_id')
                    ->label('Developer')
                    ->relationship('developer', 'name')
                    ->required(),
                Select::make('genres')
                    ->label('Genres')
                    ->multiple()
                    ->relationship('genres', 'name')
                    ->preload()
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('short_desc')->label('Short Description'),
                TextColumn::make('genres.name')
                    ->badge()
                    ->label('Genres')
                    ->separator(','),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
