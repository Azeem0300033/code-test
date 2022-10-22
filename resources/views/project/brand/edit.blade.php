{{-- it's model body for brand edit --}}
<form id="brandStore" onsubmit="event.preventDefault(); storeAjax('{{ route('brand.update',[$brand->id]) }}','brandStore');" method="post" novalidate>
    @csrf
    @method('PUT')
    <div class="modal-body">
        {{-- this include file is hold brand all input fields basically it's use for same edit and add funcionalty --}}
        @include('project.brand.field')
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            Update changes
        </button>
    </div>
</form>
