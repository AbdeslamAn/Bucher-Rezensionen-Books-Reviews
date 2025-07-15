<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Buch extends Model
{
    use HasFactory;

    public function rezension()
    {
        return $this->hasMany(Rezension::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }

    public function scopePopular(Builder $query): Builder
    {
        return $query->withCount('rezension')
            ->orderBy('rezension_count', 'desc');
    }

    public function scopeAmBestenBewertet(Builder $query): Builder
    {
        return $query->withAvg('rezension', 'bewertung')
            ->orderBy('rezension_avg_bewertung', 'desc');
    }
}
