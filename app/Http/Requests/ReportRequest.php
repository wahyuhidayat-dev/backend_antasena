<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'asset_id' => 'required',
            'periode' => 'required|max:255',
            'revenue_usd' => 'required',
            'rate_idr' => 'required',
            'revenue_idr' => 'required',
            'label_revenue' => 'required',
            'get_ugc' => 'required',
            'marketing' => '',
            'share_revenue' => 'required',
            'tax' => 'required',
            'final_revenue' => 'required',
            'share' => 'required',
            'ads' => 'required',
        ];
    }
}
