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
use Filament\Navigation\NavigationItem;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required(),
                Forms\Components\TextInput::make('email')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('role')
                ->label('Role')
                ->options(Role::all()->pluck('name', 'name'))
                ->default(fn ($record) => $record?->roles?->first()?->name)
                ->required()
                ->reactive()
                ->afterStateUpdated(function ($state, $set, $get, $record) {
                    if ($record) {
                        $record->syncRoles([$state]);
                    }
                }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('roles.name')
                ->label('Role')
                ->sortable()
                ->searchable()
                ->badge()
                ->colors([
                    'primary' => 'admin',
                    'success' => 'user',
                ])
                ->limit(1), // Shows only one role (adjust if needed)
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    // public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    // {
    //     return parent::getEloquentQuery()
    //         ->where('name', '!=', 'Admin');
    // }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        // You can use: 'primary', 'secondary', 'success', 'warning', 'danger', or 'gray'
        return 'warning';
    }

    public static function afterSave(Form $form, Model $record): void
    {
        $role = $form->getState()['role'];
        if ($role) {
            $record->syncRoles([$role]);
        }
    }
}
