<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理者新規登録ページ</title>
</head>
<body>
    <h1>管理者新規登録ページ</h1>
    <form action="{{ url('admin/add') }}" method="post">
        @csrf
        <div>
            <label>管理者名</label>
        </div>
        <div>
            <input type="text" name="name" placeholder="管理者名を入力してください">
        </div>
        <div>
            <input type="submit" name="send" value="登録">
        </div>
        <div>
            <a href="{{ url('admins') }}">戻る</a>
        </div>
    </form>
</body>
</html>
