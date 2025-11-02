@if ($bewertung)
    @for ($i = 1; $i <= 5; $i++)
        {{ $i <= round($bewertung) ? '★' : '☆' }}
    @endfor
@else
 <div class="">Noch keine Bewertung.</div>
@endif
