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
}
