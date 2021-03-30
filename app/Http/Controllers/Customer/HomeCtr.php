<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Redirect, Helper, Session;

class HomeCtr extends Controller
{
    public function index(){
        Auth::loginUsingId(Session::get('customer-id'));
        if(Auth::check()){
            return view('customer/home',[
                'gallery' => $this->displayGallery()
            ]);
        }
        else{
            return Redirect::to('/customer/customer-login'); 
        }
    }

    public function beef_and_pork_view(){
        return view('customer/beef_porkpg',[
            'beefAndPork' => $this->displayBeefAndPork()
        ]);
    }

    public function displayBeefAndPork(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id') 
        ->where('category', 'Beef and Pork') 
         
        ->get();

        return $res;
    }
//chicken&goat
    public function chicken_and_goat_view(){
        return view('customer/chicken_goatpg',[
            'chickenAndGoat' => $this->displayChickenAndGoat()
        ]);
    }

    public function displayChickenAndGoat(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id') 
        ->where('category', 'Chicken and Goat') 
         
        ->get();

        return $res;
    }
    //vegetables&seafoods
    public function vegetables_and_seafoods_view(){
        return view('customer/vegetables_seafoodspg',[
            'vegetablesAndSeafoods' => $this->displayVegetablesAndSeafoods()
        ]);
    }

    public function displayVegetablesAndSeafoods(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id') 
        ->where('category', 'Vegetables and Seafoods') 
         
        ->get();

        return $res;
    }
    //rice&soup
    public function rice_and_soup_view(){
        return view('customer/rice_souppg',[
            'riceAndSoup' => $this->displayRiceAndSoup()
        ]);
    }

    public function displayRiceAndSoup(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id') 
        ->where('category', 'Rice and Soup') 
         
        ->get();

        return $res;
    }
    //noodles&bilao
    public function noodles_and_bilao_view(){
        return view('customer/noodles_bilaopg',[
            'noodlesAndBilao' => $this->displayNoodlesAndBilao()
        ]);
    }

    public function displayNoodlesAndBilao(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id') 
        ->where('category', 'Noodles and Bilao') 
         
        ->get();

        return $res;
    }
    //alldayBreakfast
    public function allday_breakfast_view(){
        return view('customer/alldayBreakfastpg',[
            'alldayBreakfast' => $this->displayAlldayBreakfast()
        ]);
    }

    public function displayAlldayBreakfast(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id') 
        ->where('category', 'All-Day Breakfast') 
         
        ->get();

        return $res;
    }
    //valueMeals
    public function value_meals_view(){
        return view('customer/valueMealspg',[
            'valueMeals' => $this->displayValueMeals()
        ]);
    }

    public function displayValueMeals(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id') 
        ->where('category', 'Value Meals') 
         
        ->get();

        return $res;
    }
    //sizzlingPlates
    public function sizzling_plates_view(){
        return view('customer/sizzlingPlatespg',[
            'sizzlingPlates' => $this->displaySizzlingPlates()
        ]);
    }

    public function displaySizzlingPlates(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id') 
        ->where('category', 'Sizzling Plates') 
         
        ->get();

        return $res;
    }
    //comboMeals
    public function combo_meals_view(){
        return view('customer/comboMealspg',[
            'comboMeals' => $this->displayComboMeals()
        ]);
    }

    public function displayComboMeals(){
        $res = DB::table('tblmenu as M')
        ->select('M.*', 'category')
        ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id') 
        ->where('category', 'Combo Meals') 
         
        ->get();

        return $res;
    }

    public function displayGallery(){
        return DB::table('tblgallery')->paginate(12);
    }
}
