<!DOCTYPE html>
<html>
<head>
    <title>Main index</title>


       <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            background-color: #0074c2;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0074c2;
            color: #fff;
        }

        .i_btn {
            margin: 0 5px;
        }

        a {
            text-decoration: none;
            color: #0074c2;
        }

        a:hover {
            text-decoration: underline;
        }

        p.i_btn a {
            background-color: #0074c2;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
        }

        p.i_btn a:hover {
            background-color: #0056a0;
        }

        a.i_btn {
            display: inline-block;
            padding: 5px 10px;
            background-color: #0074c2;
            color: #fff;
            text-decoration: none;
        }

        a.i_btn:hover {
            background-color: #0056a0;
        }
    </style>

</head>
<body>
    <h1>Smarty CURD APP</h1>
	
    <table>
     <tr>
     <th>ID</th>
     <th>名前</th>
     <th>メール</th>
     </tr>

     {foreach $get_user as $user} 
	<tr>
	   <td>{$user.id}
       <span class="i_btn"><a href="delete.php?id={$user.id}">削除</a></span>
       <span class="i_btn"><a href="edit.php?id={$user.id}">変更</a></span>
       </td>
	   <td>{$user.name}</td>
	   <td>{$user.email}</td>
       <td><a href="generate_pdf.php?id={$user.id}">PDF プレビュー</a></td>
       <td><a href="upload_pdf.php?id={$user.id}">PDF アップロード</a></td>
	</tr>
      {/foreach}
      </table>	
	
      <p class="i_btn"><a href="./create.php">データ挿入</a></p>
     
      
</body>
</html>

