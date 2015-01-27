<?php

if (!isset($_GET['title']) || $_GET['title'] == '') {
    header("Location: search.php");
}

$title = $_GET['title'];

$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$password = 'ttrojan';

// PDO usually used for oop
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$sql = "
    SELECT title, genre_name, format_name, rating_name
    FROM dvds
    INNER JOIN genres
    ON dvds.genre_id= genres.id
    INNER JOIN formats
    ON dvds.format_id = formats.id
    INNER JOIN ratings
    ON dvds.rating_id = ratings.id
    WHERE title LIKE ?
";

// Returns a prepared statement
$statement = $pdo->prepare($sql);
$like = '%' . $title . '%';
$statement->bindParam(1, $like);

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
            <?php if ($dvds) : ?>
                <h3>Search results for '<?php echo $title ?>'.  &nbsp;</h3>
                <h4><a href="search.php">Search again.</a></h4>
                <br/>  
                <table border="1">
                    <col width="400">
                    <col width="200">
                    <col width="200">
                    <col width="200">
                    <tr>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Format</th>
                        <th>Rating</th>
                    </tr>
                <?php foreach($dvds as $dvd) : ?>
                    <tr>
                        <td><?php echo $dvd->title ?></td>
                        <td><?php echo $dvd->genre_name ?></td>
                        <td><?php echo $dvd->format_name ?></td>
                        <td><a href="ratings.php?rating=<?php echo $dvd->rating_name ?>">
                            <?php echo $dvd->rating_name ?></a></td>
                    </tr>
                <?php endforeach; ?>
                </table>
            <?php else: ?>
                <h3>Search results for '<?php echo $title ?>'.  &nbsp;</h3>
                <h4>No results were found.</h4>
                <br/>
                <h4><a href="search.php">Search again.</a></h4>
                <br/>  
            <?php endif ?>
         </div><!-- /.container -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="../bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
    </body>
</html>