<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LeaveFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'leave_type' => ['required', Rule::in(['Casual', 'Medical', 'Official', 'Maternity', 'Paternity', 'Bereavement'])],
            'from_date' => 'required|date|before_or_equal:to_date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'required|max:200',
        ];
    }
}
