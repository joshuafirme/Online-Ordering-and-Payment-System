<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utilities\User;
use Input;
use PDF;

class GrossSaleCtr extends Controller
{
    private $module = 'Reports';

    public function index(Request $request){

        $user = new User;
        $user->isUserAuthorize($this->module);

        $gs = $this->getGrossSale($request->date_from, $request->date_to);

        if(request()->ajax())
        {
            return datatables()->of($gs)
                ->make(true);
        }
        return view('reports/gross_sale');
    }

    public function getGrossSale($date_from, $date_to){
        $res = DB::table('tblgross_sale as S')
        ->select('S.*', 'description', 'category')
        ->leftJoin('tblmenu as M', 'M.id', '=', 'S.menu_id')
        ->leftJoin('tblcategory as C', 'C.id', '=', 'M.category_id')  
        ->whereBetween(DB::raw('DATE(S.created_at)'), [$date_from, $date_to])
        ->get();

        return $res;
    }

    public function computeTotalSales($date_from, $date_to){
        return DB::table('tblgross_sale as S') 
        ->whereBetween(DB::raw('DATE(S.created_at)'), [$date_from, $date_to])
        ->sum('amount');
    }

    public function previewPDF($date_from, $date_to)
    {
        $gs = $this->getGrossSale($date_from, $date_to);
        $total_sales = $this->computeTotalSales($date_from, $date_to);

        $output = $this->convertProductDataToHTML($gs, $total_sales);
    
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($output);
        $pdf->setPaper('A4', 'landscape');
    
        return $pdf->stream();
    }
    
    public function convertProductDataToHTML($gs, $total_sales)
    {
        $output = '
        <div style="width:100%">
        <p style="text-align:right;">Date: '. date('Y-m-d') .'</p>
        <h3 style="text-align:center;">Gross Sales Report</h3>
    
        <table width="100%" style="border-collapse:collapse; border: 1px solid;">
                      
            <thead>
                <tr>
                    <th style="border: 1px solid;">Description</th>     
                    <th style="border: 1px solid;">Category</th>
                    <th style="border: 1px solid;">Qty</th>  
                    <th style="border: 1px solid;">Amount</th>   
                    <th style="border: 1px solid;">Payment Method</th> 
                    <th style="border: 1px solid;">Order type</th> 
            </thead>
            <tbody>
                ';
    
            if($gs){
                foreach ($gs as $data) {
                
                    $output .='
                    <tr>                             
                    <td style="border: 1px solid; padding:10px;">'. $data->description .'</td>
                    <td style="border: 1px solid; padding:10px;">'. $data->category.'</td>  
                    <td style="border: 1px solid; padding:10px;">'. $data->qty .'</td>  
                    <td style="border: 1px solid; padding:10px;">'. number_format($data->amount,2,'.',',') .' PhP</td> 
                    <td style="border: 1px solid; padding:10px;">'. $data->payment_method .'</td>       
                    <td style="border: 1px solid; padding:10px;">'. $data->order_type .'</td>              
                </tr>
                ';
                
                } 
            }
            else{
                echo "No data found";
            }
        
          
            $output .='
            </tbody>
        </table>
    
            <p style="text-align:right;">Total: <b>'. $total_sales .' PhP</b></p>
            </div>';
    
        return $output;
    }
    
}
