<option value="">Оберіть дату</option>
@if(isset($schedules))
    @foreach($schedules as $schedule)
        <option value="{{ $schedule->date }}">{{ $schedule->date }}</option>
    @endforeach
@endif
