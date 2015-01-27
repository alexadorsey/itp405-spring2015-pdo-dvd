<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DVD Search</title>
    <link href="../bootstrap-3.3.2-dist/css/bootstrap.css" rel="stylesheet">
        
    <style>
        body {
          padding-top: 50px;
        }
        .box {
          padding: 40px 15px;
          text-align: center;
        }
        
        .search-button {
            border: none;
            background-color: transparent;
        }
        
        .search-button:hover {
            color:gray;
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
        <div class="box">
            <h1>Search hundreds of DVDs</h1>
            <form action="results.php" method="get">
                <p class="lead">DVD Title: 
                <input type="text" name="title">
                <button type="submit" class="search-button">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                </p>
                <br/>
                <img src="dvds.jpg" width="676px" height="300px"/>
            </form>
        </div>
    </div><!-- /.container -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
</body>
</html>