<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome</h1>

    <?php
        echo $users[0]['name'];
    ?>

    <br>

    <?php
        foreach ($users as $user) {
            echo $user['name'];
            echo $user['vek'];
            echo "<br>";
        }
    ?>

    @foreach ($users as $user)

        <h1>pouzivatel {{ $user["name"] }}</h1>
        <h2>ma {{ $user["vek"] }} rokov</h2>
        
        @if($user['vek'] > 18)

        <h1>moze soferovat auto</h1>
        
        @endif
    @endforeach
</body>
</html>