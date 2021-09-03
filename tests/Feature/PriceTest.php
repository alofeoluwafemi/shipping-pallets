<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PriceTest extends TestCase
{
    //All parts thickness
    const THICKNESS = 100;      //MM

    //Pallets dimension
    const LONGER_SIDE = 120;    //CM

    const SHORTER_SIDE = 100;   //CM

    const FULL_HEIGHT = 180;    //CM

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_parts_fits_into_two_pallets()
    {
        $this->withoutExceptionHandling();

        $parts = [
            [1000, 900],    //Width x Height
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900]
        ];

        $response = $this->postJson('api/price',['parts' => $parts]);

        $response->assertJson([
            'pallets' => 2
        ]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_parts_fits_into_one_pallet()
    {
        $this->withoutExceptionHandling();

        $parts = [
            [1000, 900],    //Width x Height
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
            [1000, 900],
        ];

        $response = $this->postJson('api/price',['parts' => $parts]);

        $response->assertJson([
            'pallets' => 1
        ]);
    }
}
