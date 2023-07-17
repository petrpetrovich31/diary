<?php

namespace App\Traits;

/**
 * Trait Dates
 * @package App\Traits
 * @property array $days
 * @property array $month
 * @property array $years
 */
trait Dates
{
    private $days = [];
    private $months = [];
    private $years = [];

    private function setDates(): void
    {
        for($i = 1; $i <= 31; $i++) {
            $this->days[$i] = $i;
            if($i <= 12) $this->months[$i] = now()->setMonth($i)->getTranslatedMonthName();
        }
        for($i = now()->subYear(3)->year; $i <= now()->year; $i++) $this->years[$i] = $i;
    }

    private function getDays(): array
    {
        $days = [];

        for($i = 1; $i <= 31; $i++) {
            $days[$i] = $i;
        }

        return $days;
    }

    private function getMonths(): array
    {
        $months = [];
        $months[0] = '-';

        for($i = 1; $i <=12; $i++) {
            $months[$i] = now()->setMonth($i)->getTranslatedMonthName();
        }

        return $months;
    }

    private function getYears(): array
    {
        $years = [];

        for($i = 0; $i <= 5; $i++) {
            $year = now()->year - $i;
            $years[$year] = $year;
        }

        return $years;
    }
}
