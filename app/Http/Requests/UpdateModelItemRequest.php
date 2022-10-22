<?php

namespace App\Http\Requests;

use App\Models\ModelItem;
use Illuminate\Foundation\Http\FormRequest;

class UpdateModelItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'brand_id' => 'required|integer',
        ];
    }

    public function update(\App\Models\ModelItem $modelItem)
    {
        return ModelItem::find($modelItem->id)->update($this->all());
    }
}
