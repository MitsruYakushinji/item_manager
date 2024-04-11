<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理者一覧表示ページ</title>
</head>
<body>
    <h1>管理者一覧表示ページ</h1>
    <div>
        <a href="{{ url('admin/add') }}">管理者新規登録</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>
                        <form action="{{ url('admin/edit/'. $admin->id) }}" method="get">
                            <input type="submit" value="編集">
                        </form>
                    </td>
                    <td>
                        <form action="{{ url('admin/delete/'. $admin->id) }}" method="post">
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
