<form id="modelUpdate" onsubmit="event.preventDefault(); storeAjax('{{ route('item.update',[$item->id]) }}','modelUpdate');" method="post" novalidate>
    @csrf
    @method('PUT')
    <div class="modal-body">
        @include('project.item.field')
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
            Update changes
        </button>
    </div>
</form>

<script>
    getModelItem('{{ $item->brand_id }}');
</script>
