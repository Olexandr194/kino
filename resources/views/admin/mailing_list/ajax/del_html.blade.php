<h5 class="mb-4 ml-2">Список останніх завантажених шаблонів:</h5>
@foreach($all_lists as $list)
    <div class="form-check d-flex justify-content-between lists">
        <input class="form-check-input ml-2 list_id" type="checkbox" id="check-list" name="mailing_list" value="{{ $list->id }}" data-file="{{$list->title}}">
        <label class="form-check-label ml-5"><h5>{{ $list->title }}</h5></label>
        <div class="text-danger mr-5 del-list"><h6 style="border-bottom: thin red solid; cursor: pointer;">Видалити</h6></div>
    </div>
@endforeach
