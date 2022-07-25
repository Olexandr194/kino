<table class="table table-bordered">
    <thead class="col-md-3">
    <tr>
        <th class="text-center">Назва</th>
        <th class="text-center">Дата створення</th>
        <th class="border-transparent"></th>
    </tr>
    </thead>
    <tbody class="col-md-7">

    @foreach($cinema_halls as $cinema_hall)
        <tr class="hall">
            <td class="text-center">Зал №{{ $cinema_hall->number }}</td>
            <td>{{ $cinema_hall->created_at }}</td>
            <input type="hidden" class="cinema_hall_id" value="{{ $cinema_hall->id }}">

            <td class="border-transparent col-md-1">
                <a href="{{ route('admin.cinema_halls.edit', $cinema_hall->id) }}"><i
                        class="fas fa-pencil-alt text-dark"></i></a>
                <div class="delete-hall fas fa-trash text-dark ml-3" style="cursor: pointer"></div>

            </td>
        </tr>
    @endforeach

    </tbody>
</table>
