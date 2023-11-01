<!DOCTYPE html>
<html>
<head>
  <title>アップロード結果</title>
</head>
<body>
  <h1>画像アップロード結果</h1>
  {if isset($image_path)}
    <p>画像がアップロードされました。</p>
    <img src="{$image_path}" alt="Uploaded Image">
  {else}
    <p>アップロードに失敗しました。</p>
  {/if}
  <p><a href="./upload.php">別の画像をアップロード</a></p>
</body>
</html>
