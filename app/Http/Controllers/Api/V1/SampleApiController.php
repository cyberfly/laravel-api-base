<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class SampleApiController extends ApiController
{
    public function index(Request $request)
    {
        $data = [
            'message' => 'success test API'
        ];

        return $data;
    }
}