<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use App\models\Company;

class productListController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * 商品一覧を表示。
     * @return view
    */

    public function list(){

        $products = Product::all();
        $companies = Company::all();

        return view('product.list',compact('products','companies'));
    }


    /**
     * 商品詳細を表示。
     * @param int $id
     * @return view
    */
    
    public function detail($id){

        $product = Product::find($id);

        if(is_null($product)){
            \Session::flash('flash_message','データがありません');
            return redirect(route('list'));
        }
 
        return view('product.detail',['product' => $product]);
    }


    /**
     * 編集フォームを表示。
     * @param int $id
     * @return view
    */
   
    public function exeDelete($id){


        if(empty($id)){
            \Session::flash('flash_message','データがありません');
            return redirect(route('list'));
        }
        
        $product = Product::find($id);
        $deletename = $product->image;
        $pathdel = storage_path().'/app/public/'.$deletename;
        \File::delete($pathdel);

        try{
            //データを削除
            $product = Product::destroy($id);
        }catch(\Throwable $e){
            abort(500);
        }

        \Session::flash('flash_message','削除しました');
        return redirect(route('list'));
    }
}