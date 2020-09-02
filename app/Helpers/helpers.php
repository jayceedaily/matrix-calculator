<?php

function matrixCompute(Array $matrix_a, Array $matrix_b, $operation = "MULTIPLICATION"){

    $answer = [];


    // Multiplication
    foreach($matrix_a as $a_key => $row)
    {
        for ($i=0; $i < count($matrix_b[0]) ; $i++) {

            $cell_compute = 0;

            foreach($row as $_key => $cell)
            {
                $cell_compute += $cell * $matrix_b[$_key][$i];
            }

            $answer[$a_key][$i] = $cell_compute;

        }
    }

    //.. Add other operations if necessary

    return $answer;
}
