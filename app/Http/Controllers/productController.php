<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Company;
use App\models\product;
use App\Http\Requests\ProductRequest;

class productController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * 商品登録画面を表示
     * @return view
    */
    
    public function showCreate(){

        $companies = Company::all();

        return view('product.form',compact('companies'));
    }


    /**
     * 商品を登録
     * @return view
    */

    public function exeStore(ProductRequest $request){

        //入力データを代入
        $inputs = $request->all();
        $image = $request->file('image');

        // dd($inputs,$image);

        //画像ファイルはstorageへ
        //パスはDBに保存
        if($request->hasfile('image')){
            $path = \Storage::put('/public',$image);
            $path = explode('/',$path);
        }else{
            $path[1] = null;
        }
        
        // dd($path);

        \DB::beginTransaction();
        try{
            //データをDBに登録
            $product = new Product;
            $product->fill([
                'product_name' => $inputs['product_name'],
                'company_id' => $inputs['company_id'],
                'price' => $inputs['price'],
                'stock' => $inputs['stock'],
                'comment' => $inputs['comment'],
                'image' => $path[1]
            ]);
            $product->save();
            \DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }

        \Session::flash('flash_message','商品を登録しました');
        return redirect(route('create'));
    }


    /**
     * 編集フォームを表示。
     * @param int $id
     * @return view
    */

    public function showEdit($id){

        $product = Product::find($id);
        $companies = Company::all();
        
        if(is_null($product)){
            \Session::flash('err_msg','データがありません');
            return redirect(route('list'));
        }

        return view('product.edit',compact('product','companies'));
    }


    /**
     * 商品を更新
     * @return view
    */

    public function exeUpdate(ProductRequest $request){

        //入力データを代入
        $inputs = $request->all();
        $image = $request->file('image');

        if($request->hasfile('image')){
            $path = \Storage::put('/public',$image);
            $path = explode('/',$path);
        }else{
            $path[1] = null;
        }

        \DB::beginTransaction();
        try{
            //データをDBに登録
            $product = Product::find($inputs['id']);
            $product->fill([
                'product_name' => $inputs['product_name'],
                'company_id' => $inputs['company_id'],
                'price' => $inputs['price'],
                'stock' => $inputs['stock'],
                'comment' => $inputs['comment'],
                'image' => $path[1]
            ]);
            $product->save();
            \DB::commit();
        }catch(\Throwable $e){
            DB::rollback();
            abort(500);
        }

        \Session::flash('flash_message','商品を更新しました');
        return redirect()->back();
    }
}