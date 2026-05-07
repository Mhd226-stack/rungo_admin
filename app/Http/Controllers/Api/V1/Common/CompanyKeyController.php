<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CompanyKeyController extends ApiController
{
    public function validateCompanyKey(Request $request)
    {
        return $this->respondOk([
            'success' => true,
            'message' => 'Company key is valid',
        ]);
    }
}