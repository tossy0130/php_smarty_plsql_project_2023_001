<!DOCTYPE html>
<html>
<head>
    <title>インサートページ</title>
</head>
<body>
    <h1>Smarty CURD APP アップデート</h1>

    <form action="./update.php" method="post">

        <label>名前:</label>
        <input type="text" name="name" value="{$id_user.name}" required>

        <lable>メール：</label>
        <input type="mail" name="email" value="{$id_user.email}" required>

        <input type="hidden" name="id" value="{$id_user.id}">

        <input type="submit" value="データ"> 

    </form>

    <a href="./index.php">一覧画面へ</a>

</body>
</html>