<!DOCTYPE html>
<html>
<head>
    <title>Output escaping</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Output escaping</h1>
<?php
  // Display the results of submitting the form
  if($_SERVER['REQUEST_METHOD'] === 'POST')
  {
      echo "Hello, " . htmlspecialchars($_POST['name']);
  }

  $name = "<script src='/js/app.js'>alert('Hi')</script>";
?>

<form method="POST">
    <div>
        <label for="name">Your name</label>
        <input id="name" name="name" autofocus>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
</body>
</html>