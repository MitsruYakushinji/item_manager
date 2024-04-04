<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品新規登録ページ</title>
</head>
<body>
    <h1>商品新規登録ページ</h1>
    {{-- 登録処理のHTTPメソッドはPOSTに --}}
    {{-- actionはurl関数を利用する --}}
    <form action="{{ url('item/add') }}" method="post">
        {{-- POST通信なので@csrfディレクティブを用意する --}}
        @csrf
        <div>
            <label>商品名</label>
        </div>
        <div>
            {{-- 商品名はtextに name属性はカラム名と合わせるとわかりやすい --}}
            <input type="text" name="name" placeholder="商品名を入力してください">
        </div>
        <div>
            <label>価格</label>
        </div>
        <div>
            {{-- 価格はnumberに --}}
            <input type="number" name="price" placeholder="価格を入力してください">
        </div>
        <div>
            <input type="submit" name="send" value="登録">
        </div>
        <div>
            {{-- 一覧に戻る --}}
            <a href="{{ url('item') }}">戻る</a>
        </div>
    </form>
</body>
</html>
