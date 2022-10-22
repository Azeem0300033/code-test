<div class="">
    <div class="d-flex flex-row-reverse">
        @if($submit)
            <button type="submit" class="btn btn-primary ml-2">Submit</button>
        @endif

        @if($update)
            <button type="submit" class="btn btn-info ml-2">Update</button>
        @endif

        @if($reset)
            <button type="reset" class="btn btn-success ml-2">Reset</button>
        @endif
    </div>

    @if($edit)
        <a href="{{ $edit }}" class="btn btn-sm btn-primary">
            <i class="fa fa-pencil"></i>
        </a>
    @endif
    @if($delete)
        <button type="button" class="btn btn-sm btn-danger" onclick="globelDeleteFunction('{{ $delete }}')"><i
                class="fa fa-trash"></i></button>
        <form action="{{ url($delete) }}" id="deleteBtn_{{ $delete }}" method="post">
            @method('DELETE')
            @csrf
        </form>
    @endif
</div>
