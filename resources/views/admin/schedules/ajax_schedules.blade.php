@foreach($schedules as $schedule)
    <tr class="odd text-center">
        <td class="dtr-control sorting_1" tabindex="0">{{ $schedule->date }}</td>
        <td>{{ date('H:i', strtotime($schedule->time)) }}</td>
        <td>{{ $schedule->movie->title }}</td>
        <td>Зал №{{ $schedule->cinema_hall->number }}</td>
        <td>{{ $schedule->type }}</td>
        <td>{{ $schedule->cost }}</td>
        <td><a class="ml-4"
               href="#"><i
                    class="fas fa-pencil-alt text-dark"></i></a>
            <div class="delete-user fas fa-trash text-dark ml-3"
                 style="cursor: pointer"></div></td>
    </tr>
@endforeach
