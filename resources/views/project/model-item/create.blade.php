<form id="modelStore" onsubmit="event.preventDefault(); storeAjax('{{ route('model-item.store') }}','modelStore');" method="post" novalidate>
    <div class="modal-body">
        @include('project.model-item.field')
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            Save changes
        </button>
    </div>
</form>
