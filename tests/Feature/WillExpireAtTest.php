<?php

namespace tests\Feature;

use DTApi\Helpers\TeHelper;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WillExpireAtTest extends TestCase
{
    public function test_difference_if_less_than_90()
    {
        $actual = 90;

        $difference = (new TeHelper())->willExpireAt('1:10 pm', '2021-07-14');

        $this->assertLessThanOrEqual(
            $difference,
            $actual,
            "actual value is Less than or equal to expected"
        );
    }

    public function test_difference_if_less_than_24()
    {
        $actual = 24;

        $difference = (new TeHelper())->willExpireAt('1:10 pm', '2021-07-14');

        $this->assertLessThanOrEqual(
            $difference,
            $actual,
            "actual value is Less than or equal to expected"
        );
    }

    public function test_difference_if_greter_than_24_and_less_than_or_equal_72()
    {
        $difference = (new TeHelper())->willExpireAt('1:10 pm', '2021-07-14');

        $this->assertEquals(24, $difference, '', 72);
    }


}