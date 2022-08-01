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
    <tr class="action text-center">
        <td class="">Головна сторінка</td>
        <td>{{ $main_page->created_at }}</td>
        <td>{{ $main_page->status }}</td>
        <input type="hidden" class="action_id"
               value="{{ $main_page->id }}">

        <td class="border-transparent col-md-1 text-left">
            <a class="ml-4"
               href="{{ route('admin.pages.main_page_edit') }}"><i
                    class="fas fa-pencil-alt text-dark"></i></a>
        </td>
    </tr>
    @for($i = 0; $i<5; $i++))
    <tr class="action text-center">
        <td class="">{{ $pages[$i]->title }}</td>
        <td>{{ $pages[$i]->created_at }}</td>
        <td>{{ $pages[$i]->status }}</td>
        <input type="hidden" class="action_id"
               value="{{ $pages[$i]->id }}">

        <td class="border-transparent col-md-1 text-left">
            <a class="ml-4"
               href="{{ route('admin.pages.edit', $pages[$i]->id) }}"><i
                    class="fas fa-pencil-alt text-dark"></i></a>
        </td>
    </tr>
    @endfor
    <tr class="action text-center">
        <td class="">Контакти</td>
        <td>{{ $contact_page->created_at }}</td>
        <td>Опубліковано</td>
        <td class="border-transparent col-md-1 text-left">
            <a class="ml-4"
               href="{{ route('admin.pages.contact_page_index') }}"><i
                    class="fas fa-pencil-alt text-dark"></i></a>
        </td>
    </tr>
    @for($i = 5; $i<count($pages); $i++)
        <tr class="page text-center">
            <td class="">{{ $pages[$i]->title }}</td>
            <td>{{ $pages[$i]->created_at }}</td>
            <td>{{ $pages[$i]->status }}</td>
            <input type="hidden" class="page_id"
                   value="{{ $pages[$i]->id }}">

            <td class="border-transparent col-md-1 text-left">
                <a class="ml-4"
                   href="{{ route('admin.pages.edit', $pages[$i]->id) }}"><i
                        class="fas fa-pencil-alt text-dark"></i></a>
                <div class="delete-page fas fa-trash text-dark ml-3"
                     style="cursor: pointer"></div>
            </td>
        </tr>
    @endfor
    </tbody>
</table>
