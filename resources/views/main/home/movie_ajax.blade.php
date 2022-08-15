@foreach($schedules as $schedule)
    <button type="button" class="schedule btn btn btn-outline-dark mt-3" data-mdb-ripple-color="dark"
            style="height: 100px; width: 200px; margin-right: 20px">
        {{date("H:i", strtotime($schedule->time))}} | {{$schedule->type}}<br>
        <hr>
        Зал №{{$schedule->cinema_hall->number}} | {{$schedule->cost}}грн.
    </button>
@endforeach
