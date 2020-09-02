<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatrixCalculatorRequest;

class MatrixCalculatorController extends Controller
{
    public function compute(MatrixCalculatorRequest $request)
    {
        return response(matrixCompute(  $request->input('a'),
                                        $request->input('b')));
    }
}
