<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>工場登録</title>
</head>
<body>
    
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <form method="post" action="insert.php">
        <div class="form">
            <fieldset>
                <legend>登録フォーム</legend>
                <label>company_name<input type="text" name="company_name"></label><br>
                <label>email<input type="text" name="email"></label><br>
                <label>Web<input type="text" name="web"></label><br>
                <input type="submit" value="send">
            </fieldset>
        </div>
    </form>

    <div>
        <a href="select.php">登録工場一覧</a>
    </div>
</body>
</html>