@foreach($contacts as $contact)
    <div class="card-header bg-dark text-right">
        <a class="ml-4"
           href="{{ route('admin.pages.contact_page_edit', $contact->id) }}"><i
                class="fas fa-pencil-alt text-danger"></i></a>
        <div class="delete-contact-page fas fa-trash text-danger ml-3"
             style="cursor: pointer"></div>
    </div>
    <div class="card-body row col-12">
        <input type="hidden" class="page_id"
               value="{{ $contact->id }}">
        <div class="col-md-5  mr-5">
            <div class="d-flex justify-content-between">
                <h3>{{ $contact->title }}</h3> <img src="{{ url('storage/' . $contact->logo) }}"
                                                    style="width: 200px; height: 70px"
                                                    class="text-end">
            </div>
            <div class="mt-5">
                <label>
                    <img
                        src="{{ url('storage/' . $contact->main) }}"
                        style="width: 400px; height: 250px">
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="" style="height: 80px">
                {!! $contact->address !!}
            </div>
            <div class="mt-5 w-75">
                {!! $contact->coordinates !!}
            </div>
        </div>
    </div>
@endforeach
