<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class GradesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            // ->setTitle('Sales during 2021.')
            // ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('GWA', [1.00, 1.50, 1.00, 1.30, 1.00, 1.00, 1.00, 1.00])
            ->setXAxis(['1-1', '1-2', '2-1', '2-2', '3-1', '3-2', '4-1', '4-2'])
            ->setHeight(200)
            ->setColors(['#ab830f', '#ff6384']);
    }
}
