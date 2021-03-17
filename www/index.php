<!-- put in ./www directory -->

<html>
 <head>
  <title>Hello...</title>

  <meta charset="utf-8"> 

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
    <?php echo "<h1>Test conexão</h1>"; ?>

    <?php

    $conn = mysqli_connect('db', 'user', 'test', "myDb");

    if($conn){
    $query = 'SELECT * FROM Pessoa';
    $result = mysqli_query($conn, $query);
    $erro =  mysqli_error($conn);

    print("<pre>Resultado => erro:$erro</pre>");

    echo '<table class="table table-striped">';
    echo '<thead><tr><th></th><th>id</th><th>name</th></tr></thead>';
    while($value = $result->fetch_array(MYSQLI_ASSOC)){
        echo '<tr>';
        echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
        foreach($value as $element){
            echo '<td>' . $element . '</td>';
        }

        echo '</tr>';
    }
    echo '</table>';

    $result->close();

    mysqli_close($conn);
    }else{
        echo 'Erro:' . mysqli_error($conn);
    }
    ?>
    </div>
</body>
</html>
