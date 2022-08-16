<select class="form-select" aria-label="Default select example" id="cinema_halls" style="width: 210px">
<option value="">Всі зали</option>
@foreach($cinema_halls as $hall)
    <option value="{{ $hall->id }}">Зал №{{ $hall->number }}</option>
@endforeach
</select>
