@foreach($bottom_banners as $bottom_banner)
    @if (count($bottom_banners)<2)
        <div class="col-md-3 top-img">
            @else
                <div class="col-md-2 top-img">
                    @endif
        <label>
                                                <span class="close del-bottom-img"
                                                      onclick="deleteBottomImage('{{ $bottom_banner->id ?? '' }}')"></span>
            <img id="image{{ $bottom_banner->id }}"
                 src="{{ url('storage/' . $bottom_banner->bottom_image) }}"
                 class="add-img">
        </label>
        <input type="file" id="img{{$bottom_banner->id}}-btn" accept="bottom_image/*"
               name="bottom_image[]"
               onchange="document.getElementById('image{{$bottom_banner->id}}').src = window.URL.createObjectURL(this.files[0])"
               hidden/>
        <label class="input text-center" for="img{{$bottom_banner->id}}-btn"
               style="width: 220px">Додати</label>
        @error('image')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control" style="width: 220px"
               name="bottom_url[]"
               placeholder="URL"
               value="{{ $bottom_banner->bottom_url }}">
        @error('bottom_url')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <input type="text" class="form-control mt-2" style="width: 220px"
               name="bottom_text[]"
               placeholder="Text"
               value="{{ $bottom_banner->bottom_text }}">
        @error('bottom_text')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
@endforeach
<div class="col-md-2">
    <label>
                                                <span class="close"
                                                      onclick="document.getElementById('imageBottom').src = '{{ asset('images/img_3.png') }}'"></span>
        <img id="imageBottom"
             src="{{ asset('images/add_image.png') }}"
             class="add-img">
    </label>
    <input type="file" id="imgBot-btn" accept="bottom_image/*"
           name="bottom_image[]"
           onchange="document.getElementById('imageBottom').src = window.URL.createObjectURL(this.files[0])"
           hidden/>
    <label class="input text-center" for="imgBot-btn"
           style="width: 220px">Додати</label>
    @error('bottom_image')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control" style="width: 220px"
           name="bottom_url[]"
           placeholder="URL"
           value="">
    @error('bottom_url')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <input type="text" class="form-control mt-2"
           style="width: 220px"
           name="bottom_text[]"
           placeholder="Text"
           value="">
    @error('bottom_text')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
