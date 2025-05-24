<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Industri;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Tables\Columns\TextColumn;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\IndustriResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IndustriResource\RelationManagers;

class IndustriResource extends Resource
{
    protected static ?string $model = Industri::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Grid::make(2) // form dibagi jadi 2 kolom per baris
                ->schema([
                    //foto
                    Forms\Components\FileUpload::make('foto')
                        ->label('Logo Industri')
                        ->image() //menjadikan file yang diupload akan menjadi foto
                        ->directory('industri') //folder penyimpanan distorage /app/public/[industri]
                        ->columnspan(2)
                        ->required(), //mewajibkan mengisi
                        

                    // nama
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama')                      // ada di atas form
                        ->placeholder('Nama Industri')          // ada di dalam form
                        ->columnspan(2)
                        ->required(),

                    // bidang usaha
                    Forms\Components\TextInput::make('bidang_usaha')
                        ->label('Bidang Usaha')                      // ada di atas form
                        ->placeholder('Bidang Usaha')          // ada di dalam form
                        ->required(),

                    // website industri
                    Forms\Components\TextInput::make('website')
                        ->label('Website')                      // ada di atas form
                        ->placeholder('Website Industri')          // ada di dalam form
                        ->url() //validasi ---harus berupa url
                        ->required(),

                    // email
                    Forms\Components\TextInput::make('email')
                        ->label('Email')                    // ada di atas form
                        ->placeholder('Email Industri')       // ada di dalam form
                        ->email()
                        ->unique(ignoreRecord: true)
                        ->validationMessages([              // ini pesan error yang akan tampil jika user memasukkan email yang sudah digunakan, agar lebih user friendly
                            'unique' => 'Email sudah dimiliki pengguna lain',
                        ])
                        ->required(),

                    // kontak
                    Forms\Components\TextInput::make('kontak')
                        ->label('Kontak')                   // ada di atas form
                        ->placeholder('Kontak Industri')     // ada di dalam form
                        ->required(),

                    // alamat
                    Forms\Components\TextInput::make('alamat')
                        ->label('Alamat')                   // ada di atas form
                        ->placeholder('Alamat Industri')    // ada di dalam form
                        ->columnspan(2)
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
                ->getStateUsing(fn ($record) => industri::orderBy('id')->pluck('id')
                ->search($record->id) + 1),

                // gambar
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Logo Industri'),
                    
                // nama
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                // bidang usaha
                Tables\Columns\TextColumn::make('bidang_usaha')
                    ->label('Bidang Usaha')
                    ->searchable()
                    ->sortable(),

                // websitem
                Tables\Columns\TextColumn::make('website')
                    ->label('Website')
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
            'index' => Pages\ListIndustris::route('/'),
            'create' => Pages\CreateIndustri::route('/create'),
            'view' => Pages\ViewIndustri::route('/{record}'),
            'edit' => Pages\EditIndustri::route('/{record}/edit'),
        ];
    }
}
