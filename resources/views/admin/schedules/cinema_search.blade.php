@if (isset($cinema_halls))
    <option value="">Оберіть кінозал</option>
    @foreach($cinema_halls as $cinema_hall)
        <option value="{{ $cinema_hall->id }}">Кінозал №{{ $cinema_hall->number }}</option>
    @endforeach
@else
    <option value="">Оберіть кінотеатр</option>
@endif
