<?php

namespace App\Http\Requests\Api\Box;

use App\Dto\BoxRequestDataDto;
use App\Enums\BoxContentTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBoxRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'room_id' => [
                'required',
                'integer',
                'exists:rooms,id'
            ],
            'content_type' => [
                'required',
                Rule::enum(BoxContentTypes::class)
            ],
        ];
    }

    public function getDto(): BoxRequestDataDto
    {
        return new BoxRequestDataDto(
            roomId: $this->input('room_id'),
            contentType: BoxContentTypes::from($this->input('content_type'))
        );
    }
}
