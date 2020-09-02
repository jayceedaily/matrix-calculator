<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatrixCalculatorRequest;

class MatrixCalculatorController extends Controller
{
    public function compute(MatrixCalculatorRequest $request)
    {

        $a = $request->input('a');

        $b = $request->input('b');

        if(count($a[0]) != count($b)) return 'error';

        $answer = [];

        foreach($a as $a_key => $row)
        {
            for ($i=0; $i < count($b[0]) ; $i++) {

                $cell_compute = 0;

                foreach($row as $_key => $cell)
                {
                    $cell_compute += $cell * $b[$_key][$i];
                }

                $answer[$a_key][$i] = $cell_compute;

            }
        }

        return $answer;
    }
}
