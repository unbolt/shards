<?php

namespace Shards\Http\Requests;

use Shards\Http\Requests\Request;

class StoreRaceRequest extends Request
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
            'name' => 'required|unique:races',
            'description' => 'required',
            'agility' => 'required|between:0,3',
            'dexterity' => 'required|between:0,3',
            'strength' => 'required|between:0,3',
            'mind' => 'required|between:0,3',
            'intelligence' => 'required|between:0,3',
            'charisma' => 'required|between:0,3'
        ];
    }
}
