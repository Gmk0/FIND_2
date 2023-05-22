<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FreelanceResource\Pages;
use App\Filament\Resources\FreelanceResource\RelationManagers;
use App\Models\Freelance;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FreelanceResource extends Resource
{
    protected static ?string $model = Freelance::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Utilisateur';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('nom')
                    ->required(),
                Forms\Components\TextInput::make('prenom')
                    ->required(),
                Forms\Components\TextInput::make('identifiant')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\Textarea::make('langue'),
                Forms\Components\Textarea::make('diplome'),
                Forms\Components\Textarea::make('certificat'),
                Forms\Components\TextInput::make('experience'),
                Forms\Components\TextInput::make('site'),
                Forms\Components\Textarea::make('competences'),
                Forms\Components\TextInput::make('taux_journalier'),
                Forms\Components\Textarea::make('comptes'),
                Forms\Components\Textarea::make('Sub_categorie'),
                Forms\Components\Textarea::make('localisation'),
                Forms\Components\TextInput::make('level')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('nom'),
                Tables\Columns\TextColumn::make('prenom'),
                Tables\Columns\TextColumn::make('identifiant'),
                // Tables\Columns\TextColumn::make('description'),
                // Tables\Columns\TextColumn::make('langue'),
                //Tables\Columns\TextColumn::make('diplome'),
                //Tables\Columns\TextColumn::make('certificat'),
                //Tables\Columns\TextColumn::make('experience'),
                //Tables\Columns\TextColumn::make('site'),
                //Tables\Columns\TextColumn::make('competences'),
                Tables\Columns\TextColumn::make('taux_journalier'),
                //Tables\Columns\TextColumn::make('comptes'),
                //Tables\Columns\TextColumn::make('Sub_categorie'),
                //Tables\Columns\TextColumn::make('localisation'),
                Tables\Columns\TextColumn::make('level'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                //Tables\Columns\TextColumn::make('updated_at')
                //  ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListFreelances::route('/'),
            'create' => Pages\CreateFreelance::route('/create'),
            'view' => Pages\ViewFreelance::route('/{record}'),
            'edit' => Pages\EditFreelance::route('/{record}/edit'),
        ];
    }
}