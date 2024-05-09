<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Infolists;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Transaction;
use Filament\Resources\Resource;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Filament\Resources\TransactionResource\Pages\ViewTransaction;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-rupee';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.display_id')->label('Order Id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('payment_type')->label('Payment Type')->icon(fn (string $state): string => match ($state) {
                    'paypal' => 'icon-paypal',
                    'razorpay' => 'icon-razorpay',
                    'cod' => 'icon-cod',
                    'stripe' => 'icon-stripe',
                }),
                Tables\Columns\TextColumn::make('display_status')->label('Status')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Paid' => 'success',
                        'Failed' => 'danger',
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
            ])->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListTransactions::route('/'),
            'view' => ViewTransaction::route('/{record}/view')
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make(('Transaction Details'))->schema([
                    Infolists\Components\TextEntry::make('order.display_id')->label('Order ID'),
                    Infolists\Components\TextEntry::make('order.total')->label('Amount'),
                    Infolists\Components\IconEntry::make('payment_type')->label('Payment Type')->icon(fn (string $state): string => match ($state) {
                        'paypal' => 'icon-paypal',
                        'razorpay' => 'icon-razorpay',
                        'cod' => 'icon-cod',
                        'stripe' => 'icon-stripe',
                    }),
                    Infolists\Components\TextEntry::make('display_status')->label('Status')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Paid' => 'success',
                        'Failed' => 'danger',
                    }),
                ])->columns(2)
            ]);
    }
}
