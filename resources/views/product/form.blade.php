@extends('layouts.app')
@section('content')



<style>

.border{
border:1px #C0C0C0 solid
}

</style>



@if(session('flash_message'))
    <div class="row offset-4 flash_message text-primary">
        {{ session('flash_message') }}
    </div>
@endif



<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('list') }}" class="col-1　btn">戻る</a>
        </div>
    </div>
    <!-- ↓↓商品詳細↓↓ -->
    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" onSubmit="return checkSubmit()">
        @csrf
        <div class="row">
            <div class="card col-12 m-3 border rounded" style="height:1300px; width:500px">
                <!-- 画像 -->
                <div class="container p-3" style="height:550px;">
                    <div class="offset-3 col-6 bg-secondary" style="height:500px;">
                        <label for="image">画像登録</label>
                        <input type="file" class="form-control-file" name="image" id="image">    
                    </div>
                </div>
                <!-- 商品・メーカー -->
                <div class="container m-3 p-3 text-center" style="height:100px;">
                    <div class="row">
                        <div class="offset-2 col-3 form-group border rounded" style="padding-top:16px;">
                            <label for="product_name">
                                商品名<br>[    ]
                            </label>
                            <input type="text" id="product_name" name="product_name" class="form-control" value="{{ old('product_name') }}">
                            @if ($errors->has('product_name'))
                                <div class="text-danger">
                                {{ $errors->first('product_name') }}
                                </div>
                            @endif
                        </div>
                        <div class="offset-2 col-3 form-group border rounded" style="padding-top:16px;">
                            <label for="company">
                                メーカー<br>[    ]
                            </label>
                            <select name="company_id" id="company" class="form-control">
                                @foreach($companies as $company)
                                <option>{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('company_id'))
                                <div class="text-danger">
                                {{ $errors->first('company_id') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- 価格・在庫 -->
                <div class="container m-3 p-3 text-center" style="height:100px;" >
                    <div class="row">
                        <div class="offset-2 col-3 form-group border rounded" style="padding-top:16px;">
                            <label for="price">
                                価格<br>[    ]
                            </label>
                            <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}">
                            @if ($errors->has('price'))
                                <div class="text-danger">
                                {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                        <div class="offset-2 col-3 form-group border rounded" style="padding-top:16px;">
                            <label for="stock">
                                在庫<br>[    ]
                            </label>
                            <input type="text" id="stock" name="stock" class="form-control" value="{{ old('stock') }}">
                            @if ($errors->has('stock'))
                                <div class="text-danger">
                                {{ $errors->first('stock') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- コメント -->
                <div class="container m-3 p-3 text-center" style="height:300px;">
                    <div class="row">
                        <div class="offset-3 col-6 form-group border rounded" style="height:300px;">
                            <label for="comment">
                                コメント
                            </label>
                            <textarea id="comment" name="comment" class="form-control" rows="10">
                                {{ old('comment')}}
                            </textarea>
                            @if ($errors->has('comment'))
                                <div class="text-danger">
                                {{ $errors->first('comment') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- 登録ボタン -->
                <div class="container m-3 p-3" style="height:100px;">
                  <button type="submit" class="offset-5 col-2 btn btn-primary">登録</button>
                </div>
            </div>
        </div>
    </form>
    <!-- ↑↑商品詳細↑↑ -->
</div>
<script>
    function checkSubmit(){
        if(window.confirm('送信してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection