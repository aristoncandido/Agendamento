<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Agendamento de Salas</title>
</head>

<style>

</style>

<body>

    <div class="container">

        <?php 
            include_once('header.php');
   ?>


        <main>
            <div class="text-center mt-5">
                <h1>Agendamento de Salas</h1>
                <h5>Selecione a sala que você deseja</h5>


            </div>
            <form action="dados.php" method='POST'>
                <div class="d-flex flex-column w-50 m-auto">
                    <label for="local">Local</label>
                    <select id="local" name="local" >
                        <option >COREN-PE(SEDE)</option>
                    </select>
                    <label for="sala">Sala</label>
                    <select id="sala" name="sala">
                        <option >MURO ALTO</option>
                    </select>
                    <div class="bttns mt-3">
                        <input class="btn btn-primary" type="submit" name="submit" value="Verificar">
                    </div>
                    <br>
                    <span class="text-center ">Desenvolvido pelo Departamento de Tecnologia da Informação <break> COREN
                            -
                            PE</span>
                </div>
            </form><!-- form -->


        </main><!-- main -->


    </div><!-- Container -->



</body>

</html>