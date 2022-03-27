<?php

namespace App\Filament\Resources\Traits;

use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait HasSoftDeletes
{
    protected static function softDeletesFilter()
    {
        return SelectFilter::make('trashed')
            ->options([
                'withTrashed' => 'With Trashed',
                'onlyTrashed' => 'Only Trashed',
            ])
            ->query(function (Builder $query, array $data) {
                $query->when($data['value'] === 'withTrashed', function (Builder $query) {
                    $query->withTrashed();
                })->when($data['value'] === 'onlyTrashed', function (Builder $query) {
                    $query->onlyTrashed();
                })->when($data['value'] === null, function (Builder $query) {
                    $query->where('deleted_at', null);
                });
            });
    }
}
