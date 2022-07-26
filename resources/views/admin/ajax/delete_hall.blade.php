<table class="table table-bordered">
    <thead class="col-md-3">
    <tr>
        <th class="text-center">Назва</th>
        <th class="text-center">Дата створення</th>
        <th class="border-transparent"></th>
    </tr>
    </thead>
    <tbody class="col-md-7">
    @if(count($cinema_halls) == 1)
        <tr class="hall">
            <td class="text-center">Зал №{{ $cinema_halls[0]->number }}</td>
            <td>{{ $cinema_halls[0]->created_at }}</td>
            <input type="hidden" class="cinema_hall_id"
                   value="{{ $cinema_halls[0]->id }}">
            <td class="border-transparent col-md-1 text-left">
                <a class="ml-4" href="{{ route('admin.cinema_halls.edit', $cinema_halls[0]->id) }}"><i
                        class="fas fa-pencil-alt text-dark"></i></a>
            </td>
        </tr>
    @elseif(count($cinema_halls) > 1)
        <tr class="hall">
            <td class="text-center">Зал №{{ $cinema_halls[0]->number }}</td>
            <td>{{ $cinema_halls[0]->created_at }}</td>
            <input type="hidden" class="cinema_hall_id"
                   value="{{ $cinema_halls[0]->id }}">

            <td class="border-transparent col-md-1 text-left">
                <a class="ml-4" href="{{ route('admin.cinema_halls.edit', $cinema_halls[0]->id) }}"><i
                        class="fas fa-pencil-alt text-dark"></i></a>
            </td>
        </tr>
        @for($i=1; $i<count($cinema_halls); $i++)
            <tr class="hall">
                <td class="text-center">Зал №{{ $cinema_halls[$i]->number }}</td>
                <td>{{ $cinema_halls[$i]->created_at }}</td>
                <input type="hidden" class="cinema_hall_id"
                       value="{{ $cinema_halls[$i]->id }}">

                <td class="border-transparent col-md-1">
                    <a href="{{ route('admin.cinema_halls.edit', $cinema_halls[$i]->id) }}"><i
                            class="fas fa-pencil-alt text-dark"></i></a>
                    <div class="delete-hall fas fa-trash text-dark ml-3" style="cursor: pointer"></div>
                </td>
            </tr>
        @endfor
    @endif
    </tbody>
</table>
