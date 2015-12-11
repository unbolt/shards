<?php

namespace Shards\Http\Requests;

use Shards\Http\Requests\Request;

class StoreJobRequest extends Request
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
            'name' => 'required|unique:jobs',
            'agility' => 'required|between:1,9',
            'dexterity' => 'required|between:1,9',
            'strength' => 'required|between:1,9',
            'mind' => 'required|between:1,9',
            'intelligence' => 'required|between:1,9',
            'charisma' => 'required|between:1,9'
        ];
    }
}
