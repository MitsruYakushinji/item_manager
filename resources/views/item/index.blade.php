<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品一覧ページ</title>
</head>
<body>
    <h1>商品一覧ページ</h1>
    <div>
        <a href="{{ url('item/add') }}">新規登録</a>
    </div>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>商品名</td>
                <td>価格</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    {{-- number_format()関数を利用することで下3桁毎にカンマをつけてくれる。 --}}
                    <td>{{ number_format($item->price) }}</td>
                    <td>
                        <form action="{{ url('item/edit/'. $item->id) }}" method="get">
                            <input type="submit" value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{ url('item/delete/'. $item->id) }}" method="post">
                            @csrf
                            <input type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
