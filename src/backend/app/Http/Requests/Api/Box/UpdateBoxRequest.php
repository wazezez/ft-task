<?php

namespace App\Http\Requests\Api\Box;

use App\Enums\BoxContentTypes;
use Illuminate\Validation\Rule;

class UpdateBoxRequest extends CreateBoxRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'content_type' => [
                'nullable',
                Rule::enum(BoxContentTypes::class)
            ],
        ]);
    }
}
