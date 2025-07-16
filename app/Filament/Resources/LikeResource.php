<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LikeResource\Pages;
use App\Filament\Resources\LikeResource\RelationManagers;
use App\Models\Like;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LikeResource extends Resource
{
    protected static ?string $model = Like::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-thumb-up';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('likeable_type')
                    ->label('Likeable Type')
                    ->options([
                        'App\Models\Post' => 'Post',
                        'App\Models\Comment' => 'Comment',
                    ])
                    ->required()
                    ->reactive(),
                Forms\Components\Select::make('likeable_id')
                    ->label('Object')
                    ->required()
                    ->searchable()
                    ->options(function (callable $get) {
                        $type = $get('likeable_type');

                        if ($type === 'App\Models\Post') {
                            return \App\Models\Post::pluck('title', 'id');
                        }

                        if ($type === 'App\Models\Comment') {
                            return \App\Models\Comment::pluck('caption', 'id');
                        }

                        return [];
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('likeable_type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('likeable_id')
                    ->label('Object')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        if ($record->likeable_type === 'App\Models\Post') {
                            return \App\Models\Post::find($state)->title ?? 'N/A';
                        } elseif ($record->likeable_type === 'App\Models\Comment') {
                            return \App\Models\Comment::find($state)->content ?? 'N/A';
                        }
                        return 'Unknown';
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => in_array(auth()->user()->role, ['admin', 'editor']))
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
            'index' => Pages\ListLikes::route('/'),
            'create' => Pages\CreateLike::route('/create'),
            'view' => Pages\ViewLike::route('/{record}'),
            'edit' => Pages\EditLike::route('/{record}/edit'),
        ];
    }
}
