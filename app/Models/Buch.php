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

    public function scopeMitRezensionCount(Builder $query, $from = null, $to = null): Builder
    {
        return $query->withCount([
            'rezension' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ]);
    }

    public function scopeMitAvgBewertung(Builder $query, $from = null, $to = null): Builder
    {
        return $query->withAvg([
            'rezension' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ], 'bewertung');
    }

    public function scopePopular(Builder $query, $from = null, $to = null): Builder
    {
        return $query->mitRezensionCount()
            ->orderBy('rezension_count', 'desc');
    }

    public function scopeAmBestenBewertet(Builder $query, $from = null, $to = null): Builder
    {
        return $query->mitAvgBewertung()
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

    public function scopePopularLetzter6Monate(Builder $query)
    {
        return $query->popular(now()->subMonths(6), now())
            ->ambestenBewertet(now()->subMonths(6), now())
            ->minRezension(5);
    }

    public function scopeambestenBewertetLetzterMonat(Builder $query)
    {
        return $query->ambestenBewertet(now()->subMonth(), now())
            ->popular(now()->subMonth(), now())
            ->minRezension(2);
    }

    public function scopeambestenBewertetLetzter6Monate(Builder $query)
    {
        return $query->ambestenBewertet(now()->subMonths(6), now())
            ->popular(now()->subMonths(6), now())
            ->minRezension(5);
    }
}
