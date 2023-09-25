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
        
                <center>
                
                <p>
                    <div class="card" style="width: 18rem; background-image:url(./favicon/background_prairie_pokemon_screencapture_by_nemotrex_de8nlib-fullview.jpg)">
                    <img src=<?= $row['link_foto'];?> class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title"><?= $row['nome'];?></h5>
                    <p class="card-descricao">Descrição: <?= $row['descricao'];?></p>
                    <p class="card-ataque">Ataque: <?= $row['atk'];?></p>
                    <p class="card-atackspeed">Velocidade de Ataque: <?= $row['spattack'];?></p>
                    <p class="card-DEFESA">Defesa: <?= $row['def'];?></p>
                    <p class="card-SUPERDEFESA">Velocidade de defesa: <?= $row['spdef'];?></p>
                    <p class="card-speed">Velocidade: <?= $row['vel'];?></p>
                    <p class="card-HP">Vida: <?= $row['hp'];?></p>
                    <p class="card-Dexnumber">Numero Dex: <?= $row['dex_number'];?></p>
                    
                    
                    
                </p>
                </center>
                
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