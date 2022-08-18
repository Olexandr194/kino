@foreach ($schedules as $k => $v)
    <div class="card-header bg-gray">
        @php $f = \Carbon\Carbon::createFromDate(date('d M', strtotime($k)))->translatedFormat('d F, D') @endphp
        <h4 style="margin-left: 50px">{{ $f }}</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr class="text-center">
                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                    rowspan="1" colspan="1" aria-sort="ascending"
                    aria-label="Rendering engine: activate to sort column descending">
                    Час
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                    colspan="1" aria-label="Browser: activate to sort column ascending">
                    Фільм
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                    colspan="1" aria-label="Browser: activate to sort column ascending">
                    Зал
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                    colspan="1"
                    aria-label="Platform(s): activate to sort column ascending">
                    Ціна (грн.)
                </th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                    colspan="1"
                    aria-label="Engine version: activate to sort column ascending">
                    Забронювати
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($v as $schedule)

                <tr class="odd text-center schedule">
                    <td class="dtr-control sorting_1" tabindex="0">{{ date('H:i', strtotime($schedule->time)) }}</td>
                    <td class="dtr-control sorting_1" tabindex="0">{{ $schedule->movie->title }}</td>
                    <td class="dtr-control sorting_1" tabindex="0">{{ $schedule->cinema_hall->number }}</td>
                    <td class="dtr-control sorting_1" tabindex="0">{{ $schedule->cost }}</td>
                    </td>
                    <td><a class="ml-4"
                           href="#"><i
                                class="fas fa-ticket fa-2x text-dark" style=""></i></a>
                        <a class="ml-4"
                           href="#"><i
                                class="fas fa-ticket fa-2x text-dark" style=""></i></a></td>

                    <input type="hidden" class="schedule_id"
                           value="">
                </tr>

            @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
@endforeach
