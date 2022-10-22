@if (session('status'))
    <div class="alert alert-{{ session('status') }} alert-dismissible alert-alt fade show">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                    class="mdi mdi-close"></i></span>
        </button>
        {{ session('message') }}
    </div>
@endif
