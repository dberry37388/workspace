<?php

namespace App\Models;

use App\Queries\v1\ProjectQuery;
use App\Services\Traits\QueryBuilderBindableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Project extends Model implements Sortable
{
    use HasFactory, SortableTrait, QueryBuilderBindableTrait;

    protected $fillable = [
        'creator_id',
        'description',
        'is_private',
        'key',
        'name',
        'owner_id',
        'properties',
    ];

    protected $casts = [
        'is_private' => 'boolean',
        'properties' => 'json',
        'creator_id' => 'integer',
        'owner_id' => 'integer'
    ];

    protected string $queryClass = ProjectQuery::class;

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
