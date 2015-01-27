<?php

if (!isset($_GET['rating'])) {
    header("Location: search.php");
}

$rating = $_GET['rating'];

$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$password = 'ttrojan';

// PDO usually used for oop
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$sql = "
    SELECT title
    FROM dvds
    INNER JOIN ratings
    ON dvds.rating_id = ratings.id
    WHERE rating_name = '" . $rating . "'"
;

// Returns a prepared statement
$statement = $pdo->prepare($sql);

// Execute sql statement
$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ);

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DVD Search</title>
        <link href="../bootstrap-3.3.2-dist/css/bootstrap.css" rel="stylesheet">
        <style>
            table {
                text-align: center;
                margin:auto;
            }
            
            th {
                text-align: center;
                font-size: 18pt;
                color: #333333;
                background-color: #e3e3e3;
                padding: 5px;
            }
            
            td {
                padding: 3px;
            }
            
            body {
                padding-top: 50px;
            }
            
            .container {
                text-align: center;
            }
            
        </style>
        
    </head>
    <body>
        
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <span class="navbar-brand">HW2: DVD search using PDO</span>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                </div><!--/.nav-collapse -->
          </div>
        </nav>
        
        <div class="container">
        <h3>All dvds with a rating of '<?php echo $rating ?>'.</h3>
        <h4><a href="search.php">Search again.</a></h4>
            
        <?php if ($dvds) : ?>
            <table border="1">
                <col width="500">
                <tr>
                    <th>Title</th>
                </tr>
            <?php foreach($dvds as $dvd) : ?>
                <tr>
                    <td><?php echo $dvd->title ?></td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No dvds with that rating. <a href="search.php">Return to search page.</a></p>
        <?php endif ?>
        </div><!-- /.container -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    </body>
</html>