<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Maintenance\Menu;
use App\Transaction\Cashiering;
use Input;
use App\Utilities\User;

class CashieringCtr extends Controller
{
    private $module = 'Transaction';

    public function index(){
        dd($this->isQtyAvailable(27, 1));
        $user = new User;
        $user->isUserAuthorize($this->module);

        return view('transaction/cashiering',[
            'tray' => $this->displayTray(),
            'totalAmount' => $this->geTotalAmount(),
            'menu' => $this->displayMenu()
        ]);
    }

    public function displayMenu(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id')   
        ->orderBy('description') 
        ->get();

        return $res;
    }

    public function search($search_key){
        
        return $this->getAvailableMenu($search_key);
    }

    

    public function getAvailableMenu($search_key){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id')
        ->where('M.description','LIKE', '%'.$search_key.'%')   
        ->where('M.status', 'Available')   
        ->get();

        return $res;
    }

    

    public function addToTray(){

        $menu_id = Input::input('menu_id');
        $amount = Input::input('amount');
        $qty = Input::input('qty');

        if($this->isMenuExists($menu_id)){
            DB::table('tblcashiering')
            ->where('menu_id', $menu_id)
            ->update(array(
                'amount' => DB::raw('amount + '. $amount),
                'qty' => DB::raw('qty + '. $qty)));
        }
        else{
            $c = new Cashiering;
            $c->menu_id = $menu_id;
            $c->qty = $qty;
            $c->amount = $amount;
            $c->save();
        }
    }

    public function isQtyAvailable($menu_id, $qty)
    {
        $current_stock = DB::table('tblmenu')->where('id', $menu_id)->value('qty');
     //   dd($current_stock);
        if($current_stock < $qty)
        {
            return '1';
        }
        else{
            return '0';
        }
    }

    public function isMenuExists($menu_id){
        $c = DB::table('tblcashiering')->where('menu_id', $menu_id);
        if($c->count() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function geTotalAmount(){
        return DB::table('tblcashiering')->sum('amount');
    }



    public function displayTray(){
        $c = new Cashiering;
        return $c->getTray();
    }

    public function removeFromTray($id){
        DB::table('tblcashiering')->where('id', $id)->delete();
    }

    public function process()
    {
        $payment_method = Input::input('payment_method');

        $c = new Cashiering;

        $trans_no = \Helper::getTransactionNumber();
        foreach($c->getTray() as $data)
        {
            DB::table('tblgross_sale')
            ->insert([
                'transaction_no' => $trans_no,
                'menu_id' => $data->menu_id,
                'qty' => $data->qty,
                'amount' => $data->amount,
                'payment_method' => $payment_method,
                'order_type' => 'Walk in',
                'created_at' => date('Y-m-d h:m:s')
            ]);

        \Helper::adjustQty($data->menu_id, $data->qty);
        }
        
        DB::table('tblcashiering')->delete();
    }

    public function updateStatus()
    {
        \Helper::updateMenuStatus();
    }


}
