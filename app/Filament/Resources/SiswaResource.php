<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2) // form dibagi jadi 2 kolom per baris
                ->schema([
                    //foto
                    Forms\Components\FileUpload::make('foto')
                        ->label('Foto Siswa')
                        ->image() //menjadikan file yang diupload akan menjadi foto
                        ->directory('siswa') //folder penyimpanan distorage /app/public/[industri]
                        ->columnspan(2),

                    // nama
                    Forms\Components\TextInput::make('nama')
                        ->label('Nama')                      // ada di atas form
                        ->placeholder('Nama Siswa')          // ada di dalam form
                        ->required(),

                    //nis
                    Forms\Components\TextInput::make('nis')
                        ->label('NIS')                    // ada di atas form
                        ->placeholder('NIS Siswa')       // ada di dalam form
                        ->validationMessages([              // ini pesan error yang akan tampil jika user memasukkan email yang sudah digunakan, agar lebih user friendly
                            'unique' => 'NIS ini sudah dimiliki pengguna lain',
                        ])
                        ->required(),

                    //gender
                    Forms\Components\Select::make('gender')
                        ->label('Jenis Kelamin')            // ada di atas form
                        ->options([
                            'L' => 'Laki-Laki',
                            'P' => 'Perempuan',
                        ])
                        ->native(false)
                        ->required(),

                    //rombel
                    Forms\Components\Select::make('rombel')
                        ->label('Rombongan Belajar')            // ada di atas form
                        ->options([
                            'SIJA A' => 'SIJA A',
                            'SIJA B' => 'SIJA B',
                        ])
                        ->native(false)
                        ->required(),

                    // email
                    Forms\Components\TextInput::make('email')
                        ->label('Email')                    // ada di atas form
                        ->placeholder('Email Siswa')       // ada di dalam form
                        ->email()
                        ->unique(ignoreRecord: true)
                        ->validationMessages([              // ini pesan error yang akan tampil jika user memasukkan email yang sudah digunakan, agar lebih user friendly
                            'unique' => 'Email sudah dimiliki pengguna lain',
                        ])
                        ->required(),

                    // kontak
                    Forms\Components\TextInput::make('kontak')
                        ->label('Kontak')                   // ada di atas form
                        ->placeholder('Kontak Siswa')     // ada di dalam form
                        ->required(),
                    
                    // alamat
                    Forms\Components\TextInput::make('alamat')
                        ->label('Alamat')                   // ada di atas form
                        ->placeholder('Alamat Siswa')    // ada di dalam form
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
                ->getStateUsing(fn ($record) => siswa::orderBy('id')->pluck('id')
                ->search($record->id) + 1),

                // gambar
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto'),

                // nama
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                // gender
                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => DB::select("select getGenderCode(?) AS gender", [$state])[0]->gender)
                    ->sortable(),

                // rombel
                Tables\Columns\TextColumn::make('rombel')
                    ->label('Rombel')
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

                //status_lapor_pkl
                Tables\Columns\BadgeColumn::make('status_lapor_pkl')
                    ->label('Status PKL')
                    ->formatStateUsing(fn ($state) => $state ? 'Aktif' : 'Tidak Aktif')
                    ->color(fn ($state) => $state ? 'success' : 'danger'),
            ])
            ->filters([
                //dropdown filter
                Tables\Filters\SelectFilter::make('gender')
                    ->label('Jenis Kelamin')            // ada di atas form
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]),

                //dropdown filter
                Tables\Filters\SelectFilter::make('rombel')
                    ->label('Rombongan Belajar')            // ada di atas form
                    ->options([
                        'SIJA A' => 'SIJA A',
                        'SIJA B' => 'SIJA B',
                    ]),
                
                Tables\Filters\TernaryFilter::make('status_lapor_pkl')
                    ->trueLabel('Aktif')
                    ->falseLabel('Nonaktif'),

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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'view' => Pages\ViewSiswa::route('/{record}'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
