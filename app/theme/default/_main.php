<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
/>
    <link rel="stylesheet" href="<?=asset_theme('default','css/style.css');?>">
    <title><?= config('name') ;?></title>
</head>
<body>
    <center>
        <h1> <?= config('name');?> </h1>
        <b> <?= config('description'); ?> </b>
        <a href="">Get started</a>
    </center>
</body>
</html>