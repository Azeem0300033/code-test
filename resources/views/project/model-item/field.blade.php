<div class="row">
    <div class="col-md-12">
        {!! Form::label('name', 'Model Name') !!}
        {!! Form::text('name',$modelItem->name ?? null,['class' => 'form-control input-default','placeholder' => 'Model Name']) !!}
    </div>
    <br>
    <div class="col-md-12">
        {!! Form::label('brand_id', 'Brand Name') !!}
        {!! Form::select('brand_id',\App\Services\GeneralService::brandArray(),$modelItem->brand_id ?? null,['class' => 'form-control input-default','placeholder' => 'Select Brand']) !!}
    </div>
</div>
