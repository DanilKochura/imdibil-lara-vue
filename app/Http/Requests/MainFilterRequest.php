<?php

namespace App\Http\Requests;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class MainFilterRequest extends FormRequest
{

    public function rules()
    {
        return [
            'sort' => ['string'],
            'order' => ['string'],
        ];
    }


}
