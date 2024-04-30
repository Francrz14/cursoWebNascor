<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>
    <?php
        function factorial($numero){
            $factorial = 1;
            while ($numero>1){
                $factorial = $factorial * $numero;
                $numero--;
             
            }
            return $factorial;
        }

        $numero = 4;
        $factorial = factorial($numero);
        
        echo $factorial.'<hr>';
     //   exit;

        $factorial = 1;
        function factorialFunction($numero){ 
            global $factorial;
            if ($numero > 1){
                $factorial *= $numero;
                return factorialFunction($numero - 1);           
                
            }else{
                return $factorial;
            }
        }
        echo factorialFunction($numero) . '<br>';
        exit;
    ?>
</body>
</html>