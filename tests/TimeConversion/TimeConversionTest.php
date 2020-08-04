<?php

namespace Tests\TimeConversion;

use App\TimeConversion\TimeConverter;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TimeConversionTest extends TestCase
{
    protected function setUp() : void
    {
        $this->timeConverter = new TimeConverter();
    }

    /**
     * Given a time in 12-hour AM/PM format, convert it to military (24-hour) time.
     * Note: Midnight is 12:00:00AM on a 12-hour clock, and 00:00:00 on a 24-hour clock.
     * Noon is 12:00:00PM on a 12-hour clock, and 12:00:00 on a 24-hour clock.
     * 
     * @test
     */
    public function timeConversionShouldWork()
    {
        $this->assertEquals('15:30:45', $this->timeConverter->to24Hour('03:30:45PM'));
        $this->assertEquals('05:30:45', $this->timeConverter->to24Hour('05:30:45AM'));
    }

    /**
     * @test
     */
    public function shouldConvertNoonAndMidnightCorrectly()
    {
        $this->assertEquals('00:00:00', $this->timeConverter->to24Hour('12:00:00AM'));
        $this->assertEquals('12:00:00', $this->timeConverter->to24Hour('12:00:00PM'));
    }

    /**
     * @test
     * 
     * @dataProvider wrongTimeProvider
     */
    public function shouldThrowExceptionWhenTimeIsInvalid($time, $message)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
        $this->timeConverter->to24Hour($time);
    }

    public function wrongTimeProvider()
    {
        return [
            ['13:00:00AM', 'Hour should be between 1 and 12'],
            ['10:61:00AM', 'Minutes and Seconds should be between 0 and 59'],
            ['10:00:70AM', 'Minutes and Seconds should be between 0 and 59'],
            ['10:00:70', 'The last two chars of the string should be the time modifier AM or PM']
        ];
    }
}
