<label class="images">
                                                <span class="close"
                                                      onclick="document.getElementById('image{{ $i }}').src = '{{ asset('images/img_3.png') }}'">
                                                </span>
    @if (isset($image[$i]))
        <img id="image{{ $i }}" src="{{ url('storage/' . $image[$i]) }}"
             class="add-img">
        <input type="hidden" class="image_id"
               value="{{ $id[$i] }}">
    @else
        <img id="image{{ $i }}" src="{{ asset('images/img_3.png') }}"
             class="add-img">
    @endif
</label>
<input type="file" id="img{{ $i }}-btn" accept="image/*" name="image[]"
       onchange="document.getElementById('image{{ $i }}').src = window.URL.createObjectURL(this.files[0])"
       hidden/>
<label class="input text-center" for="img{{ $i }}-btn"
       style="width: 200px">Додати</label>
