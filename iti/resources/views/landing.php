<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h1> This is my landing page </h1>

    <table class="table">
        <tr><th> ID</th> <th> Name</th> <th> Image</th></tr>

    <?php
        echo "Hiiiiii";
        $name="noha";
//        echo "My name is {$name}";
//        var_dump($persons);
        foreach($persons as $person){
            echo "<tr>
            <td> {$person["id"]}</td>
            <td> {$person["name"]}</td>
            <td> {$person["image"]}</td>
            </tr>  ";
        }
    ?>
    </table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
