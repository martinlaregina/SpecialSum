<?php

use app\libraries\SpecialSum;

class SpecialSumTest extends PHPUnit_Framework_TestCase
{
    protected $SpecialSum;

    public function inputNumbers()
    {
        return [
            [1, 3, 6],
            [2, 3, 10],
            [4, 10, 2002],
            [10, 10, 167960],
            [20, 20, 131282408400],
            [30, 30, 114449595062769120],
            [100, 100, 0],
        ];
    }

    /**
     * @test
     * @dataProvider inputNumbers
     */
    public function testCalculate($x, $y, $result)
    {
        $this->SpecialSum = SpecialSum::start();
        if ($result==0){
            print(PHP_EOL.PHP_EOL.'Winner '.$this->SpecialSum->calculate($x, $y));
        } else {
            $this->assertEquals($result, $this->SpecialSum->calculate($x, $y));
        }

    }

}