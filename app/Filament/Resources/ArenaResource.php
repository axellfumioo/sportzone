<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArenaResource\Pages;
use App\Models\Arena;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ArenaResource extends Resource
{
    protected static ?string $model = Arena::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('arena_name')
                    ->label('Arena Name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(string $state, Forms\Set $set) => $set('arena_slugs', Str::slug($state))), // ✅ Fix str() jadi Str::

                Forms\Components\TextInput::make('arena_slugs')
                    ->label('Slug')
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('sports_list_id')->required(),
                Forms\Components\Select::make('arena_track')
                    ->options([
                        'indoor' => 'Indoor',
                        'outdoor' => 'Outdoor',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('arena_description')->rows(3),
                Forms\Components\TextInput::make('arena_rating')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(5)
                    ->step(0.1),
                Forms\Components\TextInput::make('arena_reviews')->numeric(),
                Forms\Components\TimePicker::make('arena_opening_hours')
                    ->format('H:i')
                    ->hoursStep(1)
                    ->minutesStep(30),
                Forms\Components\TimePicker::make('arena_closing_hours')
                    ->format('H:i')
                    ->hoursStep(1)
                    ->minutesStep(30),
                Forms\Components\TextInput::make('arena_address')->required(),
                Forms\Components\TextInput::make('arena_price')->numeric(),
                Forms\Components\TextInput::make('arena_price_range'),
                Forms\Components\Select::make('selection_type')
                    ->options([
                        'difficulty' => 'Difficulty',
                        'room' => 'Room',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('selections'),
                Forms\Components\FileUpload::make('arena_background')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('arena_name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('arena_track')->sortable(),
                Tables\Columns\TextColumn::make('arena_rating')->sortable(),
                Tables\Columns\TextColumn::make('arena_address')->limit(30),
                Tables\Columns\TextColumn::make('arena_price')->money('idr', true),
                Tables\Columns\TextColumn::make('selection_type')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListArenas::route('/'),
            'create' => Pages\CreateArena::route('/create'),
            'edit' => Pages\EditArena::route('/{record}/edit'),
        ];
    }
}
