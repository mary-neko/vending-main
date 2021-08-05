@extends('layouts.app')
@section('content')
<style>

.demo{
  position: sticky;
  top: 30px;
  width: 140px;
  height: 200px;
}

.box{
    border: 1px #C0C0C0 solid;
    margin:10px 0px;
}

.img{
    display: block;
    margin: auto;
    width:auto;
    height:160px
}

.width{
    width:200px;
}

</style>



@if (session('flash_message'))
    <div class="row offset-4 flash_message text-primary">
        {{ session('flash_message') }}
    </div>
@endif



<div class="container container-fluid">
	<div class="row">
                <!-- ↓↓検索フォーム↓↓ -->
        <div class="col-3 demo">
        <a class=" col-12 mb-4 btn btn-primary " href="{{ route('create') }}" role="button">新規登録</a>
            <div class="card p-3">
                <!-- ↓↓フォーム概要↓↓ -->
                <form name="search" action="{{ route('getSearch') }}"　method="GET" >
                    @csrf
                    <!-- 商品名（部分一致） -->
                    <div class="form group">
                        <label for="product">商品名(部分一致)</label>
                        <input type="text" id="product" class="form control" name="product_name" placeholder="商品名を入力してください" size="25">
                    </div>
                    <!-- メーカー -->
                    <div class="form group">
                        <label for="company" class="my-1 d-lg-block">メーカー</label>
                        <select id="company" class="form control" name="company_id">
                            <option value="選択してください" selected>選択してください</option>
                            @foreach( $companies as $company )
                            <option>{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- 送信ボタン -->
                    <div class="form group mt-3">
                        <input type="submit" class="m-auto">
                    </div>
                </form>
                <!-- ↑↑フォーム概要↑↑ -->
            </div>
        </div>
         <!-- ↑↑検索フォーム↑↑ -->
		<div class="col-9">
            <!-- ↓↓商品リスト↓↓ -->
            <div class="card">
                <!-- ↓↓レイアウト↓↓ -->
                @foreach($products as $product)
                <div class="row no-gutters">
                    <div class="box">
                        <div class="row">
                            <!-- id -->
                            <div class="col-lg-2 text-center my-auto" style="width:100px">
                                <h4>{{ $product->id }}</h4>
                            </div>
                            <!-- 画像 -->
                            <div class="col-lg-2">
                                <img src="/storage/{{ $product->image }}" alt="Card image" class="card-img img">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <!-- ↓↓リスト概要↓↓ -->
                                    <div class="d-inline-block">
                                        <div class="float-left width">
                                            <p>商品名:{{ $product->product_name }}</p>
                                        </div>
                                        <div class="float-right width">
                                            <p>メーカー:{{ $product->company_id }}</p>
                                        </div>
                                    </div>
                                    <div class="d-inline-block">
                                        <div class="float-left width">
                                            <p>価格:{{ $product->price }}</p>
                                        </div>
                                        <div class="float-right width">
                                            <p>在庫:{{ $product->stock }}</p>
                                        </div>
                                    </div>
                                    <!-- ↑↑リスト概要↑↑ -->
                                    <div>
                                        <form method="POST" action="{{ route('delete',$product->id) }}" onSubmit="return checkDelete()" class="d-inline">
                                        @csrf
                                            <button type="submit" class="btn btn-danger ">削除</button>
                                        </form>
                                        <a href="/productlist/{{ $product->id }}" class="btn btn-primary float-right">詳細</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- ↑↑レイアウト↑↑ -->
            </div>
        </div>
    </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection