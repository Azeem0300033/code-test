{{-- it's model body for brand add --}}
<form id="brandStore" onsubmit="event.preventDefault(); storeAjax('{{ route('brand.store') }}','brandStore');" method="post" novalidate>
    <div class="modal-body">
        {{-- this include file is hold brand all input fields basically it's use for same edit and add funcionalty --}}
        @include('project.brand.field')
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            Save changes
        </button>
    </div>
</form>
