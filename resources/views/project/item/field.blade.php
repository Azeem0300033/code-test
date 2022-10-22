<div class="row">
    <div class="col-md-12">
        {!! Form::label('name', 'Item Name') !!}
        {!! Form::text('name',$item->name ?? null,['class' => 'form-control input-default','placeholder' => 'Item Name']) !!}
    </div>
    <br>
    <div class="col-md-12">
        {!! Form::label('amount', 'Item Amount') !!}
        {!! Form::number('amount',$item->amount ?? null,['class' => 'form-control input-default','placeholder' => 'Item Amount']) !!}
    </div>
    <br>
    <div class="col-md-12">
        {!! Form::label('brand_id', 'Brand Name') !!}
        {!! Form::select('brand_id',\App\Services\GeneralService::brandArray(),$item->brand_id ?? null,['class' => 'form-control input-default','placeholder' => 'Select Brand','onchange' => 'getModelItem(this.value)']) !!}
    </div>
    <br>
    <div class="col-md-12">
        {!! Form::label('model_item_id', 'Model Name') !!}
        {!! Form::select('model_item_id',[],$item->model_item_id ?? null,['class' => 'form-control input-default','placeholder' => 'Select Model','id'=> 'model_item_id']) !!}
    </div>
</div>
