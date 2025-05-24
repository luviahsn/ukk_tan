<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Guru;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GuruResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GuruResource\RelationManagers;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2) // form dibagi jadi 2 kolom per baris
                ->schema([
                    
                    // nama
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama')                      // ada di atas form
                        ->placeholder('Nama Guru')          // ada di dalam form
                        ->required(),

                    // nip
                    Forms\Components\TextInput::make('nip')
                        ->label('NIP')                       // ada di atas form
                        ->placeholder('NIP Guru')           // ada di dalam form
                        ->unique(ignoreRecord: true)
                        ->validationMessages([              // ini pesan error yang akan tampil jika user memasukkan nip yang sudah digunakan, agar lebih user friendly
                            'unique' => 'NIP ini sudah dimiliki pengguna lain',
                        ])
                        ->required(),

                    // gender
                    Forms\Components\Select::make('gender')
                        ->label('Jenis Kelamin')            // ada di atas form
                        ->options([
                            'L' => 'Laki-Laki',
                            'P' => 'Perempuan',
                        ])

                        ->native(false)
                        ->columnspan(2)
                        ->required(),
                        
                    // email
                    Forms\Components\TextInput::make('email')
                        ->label('Email')                    // ada di atas form
                        ->placeholder('Email Guru')       // ada di dalam form
                        ->email()
                        ->unique(ignoreRecord: true)
                        ->validationMessages([              // ini pesan error yang akan tampil jika user memasukkan email yang sudah digunakan, agar lebih user friendly
                            'unique' => 'Email sudah dimiliki pengguna lain',
                        ])
                        ->required(),

                    // kontak
                    Forms\Components\TextInput::make('kontak')
                        ->label('Kontak')                   // ada di atas form
                        ->placeholder('Kontak Guru')     // ada di dalam form
                        ->required(),

                    // alamat
                    Forms\Components\TextInput::make('alamat')
                        ->label('Alamat')                   // ada di atas form
                        ->placeholder('Alamat Guru')    // ada di dalam form
                        ->required(),

                         ])

                     ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->getStateUsing(fn ($record) => Guru::orderBy('id')->pluck('id')
                ->search($record->id) + 1),

                // nama
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                // gender
                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->searchable()
                    ->sortable(),

                // email
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),

                // kontak
                Tables\Columns\TextColumn::make('kontak')
                    ->label('Kontak')
                    ->searchable()
                    ->sortable(),
                ])
                ->filters([
                    //
                ])
                ->actions([
                    \Filament\Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    ])
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'view' => Pages\ViewGuru::route('/{record}'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
