<div class="card-title">
    <h3>
        {{ $pageTitle }}
        @if($ajaxForm)
            <button type="button" onclick="{{ $ajaxForm }}" class="btn btn-primary float-right">
                <i class="fa fa-plus"></i> Add
            </button>
        @endif

    </h3>
    <hr>
</div>
