<form id="brandStore" onsubmit="event.preventDefault(); storeAjax('{{ route('brand.update',[$brand->id]) }}','brandStore');" method="post" novalidate>
    @csrf
    @method('PUT')
    <div class="modal-body">
        @include('project.brand.field')
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            Update changes
        </button>
    </div>
</form>
