<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CapRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      return [
        'sample_01' => 'required|string',
      ];
    }

    public function messages()
    {
      return [
        'name.required' => '何か入力してください',
        'name.string' => '文字列で入力してください',
      ];
    }

    public function withValidator($validator)
    {
      $validator->after(function ($validator) {
        $response = json_decode(file_get_contents(
          sprintf("%s?secret=%s&response=%s", env('RECAPTCHA_API_URL', ''), env('RECAPTCHA_API_SECRET', ''), $this->input('g-recaptcha-response'))
        ),true);

        if(!$response['success']) {
          $validator->errors()->add('field', '認証に失敗しました');
        }
      });
    }
}
