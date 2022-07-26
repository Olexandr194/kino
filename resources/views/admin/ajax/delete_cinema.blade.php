<div class="d-flex">
    @if(count($cinemas) >= 1)
        <div class="col-md-2 mr-4">
            <figure>
                <p><a href="{{ route('admin.cinemas.show', $cinemas[0]->id) }}" class="">
                        <img src="{{ url('storage/' . $cinemas[0]->logo_image) }}"
                             class="w-100 add-img">
                    </a>
                <figcaption class="text-center"><h3>{{ $cinemas[0]->title }}</h3></figcaption>
            </figure>
        </div>
        @for($i=1; $i<count($cinemas); $i++)
            <div class="col-md-2 mr-4">
                                <span class="close"><img class="delete-cinema"
                                                         src="{{ asset('images/close1.png') }}"></span>
                <input type="hidden" class="cinema_id" value="{{ $cinemas[$i]->id }}">
                <figure>
                    <p><a href="{{ route('admin.cinemas.show', $cinemas[$i]->id) }}" class="">
                            <img src="{{ url('storage/' . $cinemas[$i]->logo_image) }}"
                                 class="w-100 add-img">
                        </a>
                    <figcaption class="text-center"><h3>{{ $cinemas[$i]->title }}</h3></figcaption>
                </figure>
            </div>
        @endfor
    @endif
    <div class="col-md-2">
        <figure>
            <p><a href="{{ route('admin.cinemas.create') }}" class="">
                    <img src="{{ asset('images/img_1.png') }}" class="w-100 add-img">
                </a>
            <figcaption class="text-center"><h3>Додати</h3></figcaption>
        </figure>
    </div>
</div>
