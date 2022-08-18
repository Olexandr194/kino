<option value="">Оберіть зал</option>
@if(isset($cinema_halls))
    @foreach($cinema_halls as $hall)
        <option value="{{ $hall->id }}">№ {{ $hall->number }}</option>
    @endforeach
@endif
