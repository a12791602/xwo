<?php

namespace App\Http\Requests\Backend\Admin\DynActivity;

use App\Http\Requests\BaseFormRequest;

class DynActivityDelRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'id' => 'required|numeric|exists:backend_dyn_activity_lists,id',
        ];
    }
}
