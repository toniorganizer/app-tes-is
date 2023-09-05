<?php

namespace App\Charts;

use App\Models\InformasiLowongan;
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

        // $data = [
        //     'Programmer' => InformasiLowongan::where('bidang', 'like', '%'. 'programmer'. '%')->count(),
        //     'Desainer' => InformasiLowongan::where('bidang', 'like', '%'. 'desainer'. '%')->count(),
        //     'Jasa' => InformasiLowongan::where('bidang', 'like', '%'. 'jasa'. '%')->count(),
        //     'Transportasi' => InformasiLowongan::where('bidang', 'like', '%'. 'transportasi'. '%')->count(),
        //     'Pendidik' => InformasiLowongan::where('bidang', 'like', '%'. 'pendidik'. '%')->count(),
        // ];

        $bidang = InformasiLowongan::distinct('bidang')->pluck('bidang')->toArray();

        $data = [];

        foreach ($bidang as $b) {
            $count = InformasiLowongan::where('bidang', 'like', '%' . $b . '%')->count();
            $data[$b] = $count;
        }

        $labels = array_keys($data);
        $values = array_values($data);
        
        return $this->chart->lineChart()
            ->setTitle('Tren Informasi Pasar Kerja')
            ->setSubtitle('Provinsi Sumatera Barat')
            ->addData('Jumlah', $values)
            ->setXAxis($labels);
    }
}
