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

    public function scopePopular(Builder $query, $from = null, $to = null): Builder
    {
        return $query->withCount([
            'rezension' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ])
            ->orderBy('rezension_count', 'desc');
    }

    public function scopeAmBestenBewertet(Builder $query, $from = null, $to = null): Builder
    {
        return $query->withAvg([
            'rezension' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ], 'bewertung')
            ->orderBy('rezension_avg_bewertung', 'desc');
    }

    public function scopeMinRezension(Builder $query, int $minRezension): Builder
    {
        return $query->having('rezension_count', '>=', $minRezension);
    }

    private function dateRangeFilter(Builder $query, $from = null, $to = null)
    {
        if ($from && !$to){
                    $query->where('created_at', '>=', $from);
                }
                elseif (!$from && $to){
                    $query->where('created_at', '<=', $to);
                }
                elseif ($from && $to) {
                    $query->whereBetween('created_at', [$from, $to]);
                }
        return $query;
    }

    public function scopePopularLetzterMonat(Builder $query)
    {
        return $query->popular(now()->subMonth(), now())
            ->ambestenBewertet(now()->subMonth(), now())
            ->minRezension(2);
    }
}
