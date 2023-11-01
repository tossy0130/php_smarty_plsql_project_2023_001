<!DOCTYPE html>
<html>
<head>
  <title>PDFファイルアップロード</title>
</head>
<body>
  <h1>PDFファイルをアップロード</h1>
  <form action="./upload.php" method="post" enctype="multipart/form-data">
    <label for="pdfFile">PDFファイルを選択:</label>
    <input type="file" name="pdfFile" id="pdfFile" accept=".pdf">
    <br>
    <input type="submit" value="アップロード">
  </form>
</body>
</html>
