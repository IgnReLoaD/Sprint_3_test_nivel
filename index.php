
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAMEN PHP POO</title>
</head>
<body>
<h1>EXAMEN POO en PhP</h1>
    <br>
    <h2> - Filtres: </h2>
    <form action="index.php" method="post">
        <label for="cmbTipo">&nbsp;Tipo producto: </label>
        <select id="cmbTipo" name="cmbTipo">
            <option value="TT" selected>Tots...</option>              
            <option value="HG">Higiène</option>
            <option value="AL">Alimentació</option>                
            <option value="OT">Altres</option>                          
        </select>        
        &nbsp; &nbsp; &nbsp; 
        <label for="inpPrecio">&nbsp;Precio superior a: </label>
        <input type="number" id="inpPrecio" name="inpPrecio" placeholder="0" min="0" max="50" step="1">        
        &nbsp; &nbsp; &nbsp; 
        <input type="submit" value=" Calcular ">           
    </form>
    <br>
    <hr>
    <br>
    <h2> - Resultats: </h2>
    <outputs>
        <?php  
            include('./comprar.php');
        ?>
    </outputs>
</body>
</html>