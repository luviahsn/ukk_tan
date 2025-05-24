<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2) // form dibagi jadi 2 kolom per baris
                ->schema([
                    // nama
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama')                      // ada di atas form
                        ->placeholder('Nama')          // ada di dalam form
                        ->required(),

                    // email
                    Forms\Components\TextInput::make('email')
                        ->label('Email')                    // ada di atas form
                        ->placeholder('Email Guru')       // ada di dalam form
                        ->email()
                        ->required(),

                    // email created
                    Forms\Components\DateTimePicker::make('created_at')
                        ->label('Email Dibuat')                    // ada di atas form
                        ->placeholder('Email Dibuat')       // ada di dalam form
                        ->default(now())
                        ->disabled(),

                    // password
                    Forms\Components\TextInput::make('password')
                        ->label('Sandi')                    // ada di atas form
                        ->placeholder('Sandi')       // ada di dalam form
                        ->password()
                        ->required(),

                    // roles
                    Forms\Components\Select::make('roles')
                        ->relationship('roles', 'name')                    // ada di atas form
                        ->multiple()       // ada di dalam form
                        ->columnspan(2)
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //id tu no urut dari yg terkecil hingga terbesar
                //sekedar di tabel filament aja, pada database ttp sesuai dengan id yg tersimpan dan terhapus
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->getStateUsing(fn ($record) => user::orderBy('id')->pluck('id')
                    ->search($record->id)+1),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->datetime()
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Roles')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ActionGroup::make([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
