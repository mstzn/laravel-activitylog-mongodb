<?php

namespace Spatie\Activitylog\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;
use Spatie\Activitylog\Models\DynamicParent;

interface Activity
{
    public function subject(): MorphTo;

    public function causer(): MorphTo;

    public function getExtraProperty(string $propertyName): mixed;

    public function changes(): Collection;

    public function scopeInLog(Builder $query, ...$logNames): Builder;

    public function scopeCausedBy(Builder $query, DynamicParent $causer): Builder;

    public function scopeForEvent(Builder $query, string $event): Builder;

    public function scopeForSubject(Builder $query, DynamicParent $subject): Builder;
}
