<?php
declare(strict_types=1);

// var_dump($_GET);

$signes      = [
    'add'       => '+',
    'substract' => '-',
    'multiplie' => '&times;',
    'divise'    => '&divide;',
];

$operations  = [
    'add'       => fn (int $a, int $b) => $a + $b,
    'substract' => fn (int $a, int $b) => $a - $b,
    'multiplie' => fn (int $a, int $b) => $a * $b,
    'divise'    => fn (int $a, int $b) => 0 === $b ? '&infin;' : round($a / $b, 2),
];

$printResult = false;
$signe       = '';

if (
    is_numeric($_GET['valeur01'] ?? '')
        && is_numeric($_GET['valeur02'] ?? '')
        && isset($_GET['operation'])
) {
    [
        $a,
        $b,
        $operation,
    ]   = [
        (int) $_GET['valeur01'],
        (int) $_GET['valeur02'],
        $_GET['operation'],
    ];

    $fn = $operations[$operation] ?? null;

    if ($fn instanceof \Closure)
    {
        $printResult = true;
        $signe       = $signes[$operation];
        $value       = $fn($a, $b);
    }
}
?><!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Défi PHP - 03</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between mb-3">

            <div class="logo-acs"><img
                    src="https://www.accesscodeschool.fr/wp-content/uploads/2018/10/logo_acs_noir.png"
                    style="max-height: 66px; max-width: 200px;" />
            </div>


            <div class="logo-ofp"> <img src="https://www.onlineformapro.com/wp-content/uploads/2020/01/logo-03.svg"
                    style="max-height: 66px; max-width: 200px;" />
            </div>

        </div>

        <div class="jumbotron">
            <h1>Défi PHP - 03</h1>
            <p> Saisissez des valeurs dans les deux champs puis choisissez l'action à effectuer (additionner,
                soustraire, multiplier, diviser)<br />
                Une fois l'opérateur choisi affichez le résultat de votre calcul</p>
        </div>
        <div id="resultat" class="row">
            <div class="col-6">
                <form method="GET">
                    <div class="form-group">
                        <input type="number" placeholder="Saisissez la première valeur" name="valeur01"
                            class="form-control" value="<?= $_GET['valeur01'] ?? ''; ?>"></input><br />
                        <input type="number" placeholder="Saisissez la seconde valeur" name="valeur02"
                            class="form-control" value="<?= $_GET['valeur02'] ?? ''; ?>"></input><br />
                        <label class="form-check-label" for="operation">Choisissez un opérateur</label><br />
                        <button name="operation" value="add" class="btn btn-primary">Addition</button>
                        <button name="operation" value="substract" class="btn btn-primary">Soustraction</button>
                        <button name="operation" value="multiplie" class="btn btn-primary">Multiplication</button>
                        <button name="operation" value="divise" class="btn btn-primary">Division</button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <?php if($printResult): ?>
                    <h5>Résultat:</h5>
                    <code>
                        <?php printf('%d %s %d = %s', $a, $signe, $b, $value); ?>
                    </code>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>