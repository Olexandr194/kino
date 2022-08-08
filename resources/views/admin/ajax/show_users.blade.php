@foreach($users as $user)
    <tr class="action text-center">
        <td class="">{{ $user->id }}</td>
        <td class="">{{ $user->created_at }}</td>
        <td class="">{{ $user->birthday }}</td>
        <td class="">{{ $user->email }}</td>
        <td class="">{{ $user->phone }}</td>
        <td class="">{{ $user->name}} {{$user->surname}}</td>
        <td>{{ $user->nickname }}</td>
        <td>{{ $user->city }}</td>
        <input type="hidden" class="action_id"
               value="{{ $user->id }}">

        <td class="border-transparent col-md-1 text-left">
            <a class="ml-4"
               href="{{ route('admin.users.edit', $user->id) }}"><i
                    class="fas fa-pencil-alt text-dark"></i></a>
            <div class="delete-action fas fa-trash text-dark ml-3"
                 style="cursor: pointer"></div>
        </td>
    </tr>
@endforeach
