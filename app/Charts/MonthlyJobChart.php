<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyJobChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Digital sales', [73, 30, 78, 20, 60, 63])
            ->addData('Physical sales', [60, 49, 80, 84, 25, 23])
            ->addData('average', [73, 21, 71, 29, 52, 40])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
