<table class="table table-bordered">
    <thead class="col-md-3">
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Дата реєстрації</th>
        <th class="text-center">Дата народження</th>
        <th class="text-center">Email</th>
        <th class="text-center">Телефон</th>
        <th class="text-center">ПІБ</th>
        <th class="text-center">Псевдонім</th>
        <th class="text-center">Місто</th>
        <th class="border-transparent"></th>
    </tr>
    </thead>
    <tbody class="col-md-7" id="content">
    @foreach($users as $user)
        <tr class="users text-center">
            <td class="">{{ $user->id }}</td>
            <td class="">{{ $user->created_at }}</td>
            <td class="">{{ $user->birthday }}</td>
            <td class="">{{ $user->email }}</td>
            <td class="">{{ $user->phone }}</td>
            <td class="">{{ $user->name}} {{$user->surname}}</td>
            <td>{{ $user->nickname }}</td>
            <td>{{ $user->city }}</td>
            <input type="hidden" class="user_id"
                   value="{{ $user->id }}">

            <td class="border-transparent col-md-1 text-left">
                <a class="ml-4"
                   href="{{ route('admin.users.edit', $user->id) }}"><i
                        class="fas fa-pencil-alt text-dark"></i></a>
                <div class="delete-user fas fa-trash text-dark ml-3"
                     style="cursor: pointer"></div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
