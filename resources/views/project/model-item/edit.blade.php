<form id="modelUpdate" onsubmit="event.preventDefault(); storeAjax('{{ route('model-item.update',[$modelItem->id]) }}','modelUpdate');" method="post" novalidate>
    @csrf
    @method('PUT')
    <div class="modal-body">
        @include('project.model-item.field')
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            Update changes
        </button>
    </div>
</form>
