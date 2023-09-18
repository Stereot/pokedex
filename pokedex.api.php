<?php

$host = "silly.db.elephantsql.com";
$user = "noubnqni";
$pass = "mUJFVGbn2FxrQK7SpNR_ff1wQlV6wwE0";
$db = "noubnqni";

?>

<?php

//InfoPokemons

if(isset($_POST["buscar_pokemon"])){
    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $busca=$_POST['id'];

        $query = 'SELECT * FROM "public"."pokemon" where dex_number='.$busca; // Ordenar por ID de forma descendente
        $results = $pdo->query($query);
        foreach ($results as $row) {
?>
            <html>
                <p>
                    <button id=<?=$row['dex_number'];?> style="width:100%" class="btn-primary exibir_informacoes"><?= $row['nome'];?></button>
                    
                </p>

                
            </html>
            
            <?php
        }
    } catch (PDOException $e) {
        // Lide com erros, se necessário
        die("Error: " . $e->getMessage());
    }
}







//pokemons
if(isset($_POST["querycall"])){
    try {
        $pdo = new PDO("pgsql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = 'SELECT * FROM "public"."pokemon" LIMIT 100'; // Ordenar por ID de forma descendente
        $results = $pdo->query($query);
        foreach ($results as $row) {
?>
            <html>
                <p>
                    <button id=<?=$row['dex_number'];?> style="width:100%" class="btn-primary exibir_informacoes"><?= $row['nome'];?></button>
                </p>
            </html>

<?php
        }
    } catch (PDOException $e) {
        // Lide com erros, se necessário
        die("Error: " . $e->getMessage());
    }
}


?>