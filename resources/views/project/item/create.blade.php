<form id="itemStore" onsubmit="event.preventDefault(); storeAjax('{{ route('item.store') }}','itemStore');" method="post" novalidate>
    <div class="modal-body">
        @include('project.item.field')
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            Save changes
        </button>
    </div>
</form>
