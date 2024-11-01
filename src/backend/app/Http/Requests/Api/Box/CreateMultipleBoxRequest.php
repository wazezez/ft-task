<?php

namespace App\Http\Requests\Api\Box;

use App\Dto\BoxRequestDataDto;
use App\Dto\CreateMultipleBoxDataRequestDto;
use App\Enums\BoxContentTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateMultipleBoxRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'quantity' => [
                'required',
                'numeric'
            ],
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

    public function getDto(): CreateMultipleBoxDataRequestDto
    {
        return new CreateMultipleBoxDataRequestDto(
            $this->input('quantity'),
            new BoxRequestDataDto(
                $this->input('room_id'),
                BoxContentTypes::from($this->input('content_type'))
            )
        );
    }
}
