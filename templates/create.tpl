<!DOCTYPE html>
<html>
<head>
    <title>インサートページ</title>
</head>
<body>
    <h1>Smarty CURD APP インサート</h1>

    <form action="./create.php" method="post">

        <label>名前:</label>
        <input type="text" name="name" required>

        <lable>メール：</label>
        <input type="mail" name="email" required>

        <input type="submit" value="データ挿入"> 

    </form>

    <a href="./index.php">一覧画面へ</a>

</body>
</html>