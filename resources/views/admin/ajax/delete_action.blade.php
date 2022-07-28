<table class="table table-bordered">
    <thead class="col-md-3">
    <tr>
        <th class="text-center">Назва</th>
        <th class="text-center">Дата створення</th>
        <th class="text-center">Статус</th>
        <th class="border-transparent"></th>
    </tr>
    </thead>
    <tbody class="col-md-7">
    @foreach($actions as $item)
        <tr class="action text-center">
            <td class="">{{ $item->title }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->status }}</td>
            <input type="hidden" class="action_id"
                   value="{{ $item->id }}">

            <td class="border-transparent col-md-1 text-left">
                <a class="ml-4"
                   href="{{ route('admin.actions.edit', $item->id) }}"><i
                        class="fas fa-pencil-alt text-dark"></i></a>
                <div class="delete-action fas fa-trash text-dark ml-3"
                     style="cursor: pointer"></div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
