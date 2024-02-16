<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./views/style.css"/>
  <meta name="viewport" content="width=device-width, initial-1:1">
  <title>
        <?php if (isset($title)): ?>
        <?= $title ?>
        <?php else:?>
        Banque
        <?php endif ?>
    </title>
    
</head>
<body>