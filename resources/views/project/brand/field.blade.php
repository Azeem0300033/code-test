{{-- use collective HTML for input fields and this file is same for edit and create that is why i use include in the blade --}}
<div class="row">
    <div class="col-md-12">
        {!! Form::label('name', 'Brand Name') !!}
        {!! Form::text('name',$brand->name ?? null,['class' => 'form-control input-default','placeholder' => 'Brand Name']) !!}
        <span class="text-danger">
            @error('name')
                {{$message}}
            @enderror
        </span>
    </div>
</div>
