<?php

namespace Shards\Http\Requests;

use Shards\Http\Requests\Request;

class StoreCharacterRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:characters',
            'job_id' => 'required',
            'race_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You need to enter a name!',
            'job_id.required' => 'Please select a job.',
            'race_id.required' => 'Please select a race.'
        ];
    }
}
