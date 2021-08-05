<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\product;
use App\models\Company;


class SearchController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * 検索結果をリストに表示
     * @return view
    */

    public function getSearch(Request $request){
        //入力されたテキストを取得
        $companies = Company::all();

        $search1 = $request->input('product_name');
        $search2 = $request->input('company_id');

        // dd($search2);

        $query = Product::query();

        //テキストが入力されている場合
        if(!empty($search1)){
            $query->where('product_name','like','%'.$search1.'%')->get();
        }
        if(!empty($search2) && $search2 != ('選択してください')){
            $query->where('company_id','like',$search2)->get();
        }
        $products = $query->get();

        // dd($products);

        return view('Product.list',compact('products','companies'));
    }
}
