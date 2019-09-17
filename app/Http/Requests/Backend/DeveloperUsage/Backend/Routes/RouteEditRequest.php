<?php

namespace App\Http\Requests\Backend\DeveloperUsage\Backend\Routes;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Validation\Rule;

class RouteEditRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|numeric|exists:backend_admin_routes,id',
            'controller' => 'required|string',
            'method' => 'required|string',
            'menu_group_id' => 'required|numeric|exists:backend_system_menus,id',
            'title' => ['required', 'string', Rule::unique('backend_admin_routes')->ignore($this->get('id'))],
        ];
    }

    /*public function messages()
{
return [
'lottery_sign.required' => 'lottery_sign is required!',
'trace_issues.required' => 'trace_issues is required!',
'balls.required' => 'balls is required!'
];
}*/
}
