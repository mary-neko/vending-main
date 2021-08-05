@extends('layouts.app')
@section('content')

<style>
.border{
    border:2px #C0C0C0 solid
}

.img{
    display: block;
    margin: auto;
    width:auto;
    height:500px
}

.padding-top{
    padding-top:16px;
}
</style>



<div class="container">
<div class="row">
        <div class="col-12">
            <a href="{{ route('list') }}" class="col-1　btn">戻る</a>
        </div>
    </div>
    <!-- ↓↓商品詳細↓↓ -->
    <div class="row">
        <div class="card col-12 m-3 border rounded" style="height:1300px; width:500px">
            <h3 class="text-center p-3">
                <span class="p-2">ID:[ {{ $product->id }} ]</span>
            </h3>
            <div class="container p-3" style="height:550px;">
                <div class="offset-3 col-6">
                    <img src="/storage/{{$product->image}}" alt="Card image" class="card-img img">
                </div>
            </div>
            <div class="container m-3 p-3 text-center" style="height:100px;">
                <div class="row">
                    <div class="offset-2 col-3 border rounded padding-top">
                        <p>商品名<br>[ {{ $product->product_name }} ]</p>
                    </div>
                    <div class="offset-2 col-3 border rounded padding-top">
                        <p>メーカー<br>[ {{ $product->company_id }} ]</p>
                    </div>
                </div>
            </div>
            <div class="container m-3 p-3 text-center" style="height:100px;">
                <div class="row">
                    <div class="offset-2 col-3 border rounded padding-top">
                        <p>価格<br>[ {{ $product->price }} ]</p>
                    </div>
                    <div class="offset-2 col-3 border rounded padding-top">
                        <p>在庫<br>[ {{ $product->stock }} ]</p>
                    </div>
                </div>
            </div>  
            <div class="container m-3 p-3 text-center" style="height:300px;">
                <div class="row">
                    <div class="offset-3 col-6 border rounded" style="height:300px;">
                        @if(empty($product->comment))
                        <p>コメントがありません</p>
                        @else
                        <p>{{ $product->comment }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container m-3 p-3" style="height:100px;">
                <a href="/productlist/edit/{{ $product->id }}" class=" offset-5 col-2 btn btn-primary">編集へ</a>
            </div>
        </div>
    </div>    
    <!-- ↑↑商品詳細↑↑ -->
</div>
@endsection