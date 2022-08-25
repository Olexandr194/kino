@foreach($users as $user)
    <tr class="users text-center">
        <td class="users-list">
            <input class="" name="user_id[]" value="{{ $user->id }}" type="checkbox" id="users-list">
        </td>
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
    </tr>
@endforeach
