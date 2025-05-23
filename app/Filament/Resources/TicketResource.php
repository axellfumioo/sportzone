<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Filament\Resources\TicketResource\RelationManagers;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required(),
                Forms\Components\Select::make('sports_id')
                    ->required()
                    ->searchable(),
                Forms\Components\TimePicker::make('time')
                    ->required(),
                Forms\Components\DateTimePicker::make('validuntil')
                    ->label('Valid Until')
                    ->required(),
                Forms\Components\Select::make('is_used')
                    ->label('Status Penggunaan')
                    ->options([
                        'used' => 'Digunakan',
                        'not_used' => 'Tidak Digunakan',
                    ])
                    ->required()
                    ->default('not_used'),
                Forms\Components\TextInput::make('qty')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user_id')->sortable(),
                Tables\Columns\TextColumn::make('sports_id')->sortable(),
                Tables\Columns\TextColumn::make('selections')->sortable(),
                Tables\Columns\TextColumn::make('is_used')->sortable(),
                Tables\Columns\TextColumn::make('qty')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTickets::route('/'),
        ];
    }
}
