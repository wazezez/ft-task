<?php

namespace App\Http\Requests\Api\Box;

use App\Dto\BoxRequestDataDto;
use App\Dto\UpdateMultipleBoxDataRequestDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMultipleBoxRequest extends FormRequest
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
            'ids' => [
                'required',
                'array'
            ],
            'ids.*' => ['integer'],
            'room_id' => [
                'required',
                'integer',
                'exists:rooms,id'
            ],
        ];
    }

    public function getDto(): UpdateMultipleBoxDataRequestDto
    {
        return new UpdateMultipleBoxDataRequestDto(
            $this->input('ids'),
            new BoxRequestDataDto(
                $this->input('room_id'),
                null
            )
        );
    }
}
