@foreach($top_banners as $top_banner)
    @if (count($top_banners)<2)
        <div class="col-md-3 top-img">
            @else
                <div class="col-md-2 top-img">
                    @endif
                    <label>
                                                <span class="close del-top-img"
                                                      onclick="deleteTopImage('{{ $top_banner->id ?? '' }}')"></span>
                        <img id="image{{ $top_banner->id }}"
                             src="{{ url('storage/' . $top_banner->image) }}"
                             class="add-img">
                    </label>
                    <input type="file" id="img{{$top_banner->id}}-btn"
                           accept="image/*"
                           name="image[]"
                           onchange="document.getElementById('image{{$top_banner->id}}').src = window.URL.createObjectURL(this.files[0])"
                           hidden/>
                    <label class="input text-center"
                           for="img{{$top_banner->id}}-btn"
                           style="width: 220px">Додати</label>
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" style="width: 220px"
                           name="url[]"
                           placeholder="URL"
                           value="{{ $top_banner->url }}">
                    @error('url')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control mt-2"
                           style="width: 220px"
                           name="text[]"
                           placeholder="Text"
                           value="{{ $top_banner->text }}">
                    @error('text')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @endforeach
                @if (count($top_banners)<2)
                    <div class="col-md-3">
                        @else
                            <div class="col-md-2">
                                @endif
                                <label>
                                                <span class="close"
                                                      onclick="document.getElementById('imageNew').src = '{{ asset('images/img_3.png') }}'"></span>
                                    <img id="imageNew"
                                         src="{{ asset('images/add_image.png') }}"
                                         class="add-img">
                                </label>
                                <input type="file" id="imgNew-btn" accept="image/*"
                                       name="image[]"
                                       onchange="document.getElementById('imageNew').src = window.URL.createObjectURL(this.files[0])"
                                       hidden/>
                                <label class="input text-center" for="imgNew-btn"
                                       style="width: 220px">Додати</label>
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" style="width: 220px"
                                       name="url[]"
                                       placeholder="URL"
                                       value="">
                                @error('url')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control mt-2"
                                       style="width: 220px"
                                       name="text[]"
                                       placeholder="Text"
                                       value="">
                                @error('text')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
