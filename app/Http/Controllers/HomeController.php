<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoices;

class HomeController extends Controller
{
    public function index()
    {
        $count = invoices::count();
        $cout1 = invoices::where('Value_Status','1')->count();
        $cout2 = invoices::where('Value_Status','2')->count();
        $cout3 = invoices::where('Value_Status','3')->count();
        $result1 = $cout1 / $count *100;
        $result2 = $cout2 / $count *100;
        $result3 = $cout3 / $count *100;

        $chartjs = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->labels(['الفواتير الغير مدفوعه', 'الفواتير المدفوعه جزئيا', 'الفواتير المدفوعه'])
        ->datasets([
            [
                "label" => "الفواتير الغير مدفوعه",
                'backgroundColor' => ['#F51657','#E6A633', '#0DD973'],
                'data' => [$result2 ,0 ,0 ]
            ],
            [
                "label" => "الفواتير المدفوعه جزئيا",
                'backgroundColor' => ['#E6A633','#E6A633','#E6A633'],
                'data' => [0 ,$result3 ,0 ]
            ],
            [
                "label" => "الفواتير المدفوعه",
                'backgroundColor' => ['#0DD973','','#0DD973'],
                'data' => [0 ,0 ,$result1 ]
            ],
          
        ])
        ->options([]);

        
        $chartjs4 = app()->chartjs
        ->name('barChartTest')
        ->type('radar')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['Eating', 'Drinking', 'Sleeping' , 'Designing' , 'Coding' , 'Cycling','Running'])
        ->datasets([
            [
                "label" => "My First Dataset",
                'backgroundColor' => ['rgba(255, 99, 132, 0.2)'],
                'borderColor' => ['rgb(255, 99, 132)'],
                'pointBackgroundColor' => ['rgb(255, 99, 132)'],
                'pointBorderColor' => [ '#fff'],
                'pointHoverBackgroundColor' => [ '#fff'],
                'pointHoverBorderColor' => [ 'rgb(255, 99, 132)'],
                'fill' => true,
                'data' => [65, 59, 90, 81, 56, 55, 40]
            ],
            [
                "label" => "My Second Dataset",
                'backgroundColor' => ['rgba(54, 162, 235, 0.2)'],
                'borderColor' => ['rgb(54, 162, 235)'],
                'pointBackgroundColor' => ['rgb(54, 162, 235)'],
                'pointBorderColor' => [ '#fff'],
                'pointHoverBackgroundColor' => [ '#fff'],
                'pointHoverBorderColor' => [ 'rgb(54, 162, 235)'],
                'fill' => true,
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ]     
          ])
        ->options([]);




        $chartjs_2= app()->chartjs
        ->name('pieChartTest')
        ->type('doughnut')
        ->labels(['الفواتير الغير مدفوعه','الفواتير المدفوعه', 'الفواتير المدفوعه جزئيا'])
        ->datasets([
            [
                "label" => "الفواتير الغير مدفوعه",
                'backgroundColor' => ['#F51657','#0DD973', '#E6A633'],
                'data' => [$result2, $result1 , $result3],
                'backgroundColor' => ['#F51657','#0DD973', '#E6A633'],
                'hoverOffset' => 4
            ],
         
          
        ])
        ->options([]);

        

   
        return view('index', compact('chartjs','chartjs_2'));
    }
}
