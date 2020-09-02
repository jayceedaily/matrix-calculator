<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatrixCalculationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMatrixCompute()
    {
        $response = $this->post('/api/matrix-compute', [
            'a' =>  [
                [1,2,3],
                [4,5,6],
                [7,8,8]
            ],

            'b' =>  [
                [9,8,7],
                [6,5,4],
                [3,2,1]
            ],
            'a_row' => 3,
            'a_column' => 3,

            'b_row' => 3,
            'b_column' => 3,
        ]);

        $response->assertStatus(200);
    }

    public function testMatrixComputeErrorHandling()
    {
        $response = $this->post('/api/matrix-compute', [
            'a' =>  [
                [1,2,3],
                [4,5,6],
                [7,8,8]
            ],

            'b' =>  [
                [9,8,7],
                [6,5,4],
                [3,2,1]
            ],
            'a_row' => 3,
            'a_column' => 3,

            'b_row' => 4,
            'b_column' => 3,
        ]);

        $response->assertStatus(422);
    }
}
