<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defis PHP</title>
</head>
<body>
    
<h1>Les défis</h1>
<ul>
    <?php

        foreach(scandir(__DIR__) as $file):
            if('index.php' === $file || ! str_ends_with($file, '.php'))
            {
                continue;
            } ?>
            <li>
                <a href="./<?= $file; ?>" title="Défi <?=$file; ?>">
                    <?= $file; ?>
                </a>
            </li>

      <?php  endforeach; ?>
</ul>

</body>
</html>