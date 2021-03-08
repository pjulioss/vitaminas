<!DOCTYPE html>
<html lang="pt-br">

<?php include_once "templates/header.php";?>

<h4 class="text-center mb-3 mt-3">Oba, vamos cadastrar a sua receita de vitamina.</h4>


<?php
$nome = $email = $vitamina = $ingredientes = $preparo = '';
$msgErro = array('nome' => '', 'email' => '', 'vitamina' => '', 'ingredientes' => '', 'preparo' => '');

if (isset($_POST['submit'])) {
    //Checando nome de usuário
    if (empty($_POST['nome'])) {
        $msgErro['nome'] = "Informe um nome";
    } else {
        $nome = $_POST['nome'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $nome)) {
            $msgErro['nome'] = "O nome deve conter apenas letras e espaços.";
        }
    }
    //Checando email
    if (empty($_POST['email'])) {
        $msgErro['email'] = "Necessário informar um email.";
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msgErro['email'] = "Insira um email válido!";
        }
    }
    // Checando nome da bebida
    if (empty($_POST['vitamina'])) {
        $msgErro['vitamina'] = "Informe um nome";
    } else {
        $vitamina = $_POST['vitamina'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $vitamina)) {
            $msgErro['vitamina'] = "O nome deve conter apenas letras e espaços.";
        }
    }
    // Checando ingredientes
    if (empty($_POST['ingredientes'])) {
        $msgErro['ingredientes'] = "Informe os ingredientes necessários!";
    } else {
        $ingredientes = $_POST['ingredientes'];
        $regex = '/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/';
        if (!preg_match($regex, $ingredientes)) {
            $msgErro['ingredientes'] = "Separe os ingredientes por virgula ( , )";
        }
    }
    // Checando preparo
    $preparo = $_POST['preparo'];
    if (empty($_POST['preparo'])) {
        $msgErro['preparo'] = "Descreva a forma de preparar a bebida.";
    }
    if (!array_filter($msgErro)) {
        header('Location: index.php');
    }
}

?>

<section class="container-fluid mt-3 ">

    <div class="row mb-3 ">
        <div class="col img-form ">
            <img src="img/bebida_form.jpg" alt="" class="img-fluid shadow-lg">
        </div>
        <form class="col shadow-lg" action="add.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Seu nome</label>
                <span class="ml-3 text-danger"><?=$msgErro['nome']?></span>
                <input type="text" name="nome" class="form-control" value="<?=htmlspecialchars($nome);?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Seu email</label>
                <span class="ml-3 text-danger"><?=$msgErro['email']?></span>
                <input type="text" name="email" class="form-control" placeholder="ex: fulano@email.com"
                    value="<?=htmlspecialchars($email);?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Nome da vitamina</label>
                <span class="ml-3 text-danger"><?=$msgErro['vitamina']?></span>
                <input type="text" name="vitamina" class="form-control" value="<?=htmlspecialchars($vitamina);?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Foto da bebida</label>
                <input class="form-control" type="file" name="imgBebida">
            </div>
            <div class="mb-3">
                <label class="form-label">Ingredientes</label>
                <span class="ml-3 text-danger"><?=$msgErro['ingredientes']?></span>
                <textarea name="ingredientes" class="form-control"
                    placeholder="Descreva os ingredientes separados por vírgula"
                    rows="3"><?=htmlspecialchars($ingredientes);?></textarea>
            </div>
            <div class="mb-4">
                <label class="form-label">Preparo</label>
                <span class="ml-3 text-danger"><?=$msgErro['preparo']?></span>
                <textarea name="preparo" class="form-control" placeholder="Descreva a forma de preparo"
                    rows="3"><?=htmlspecialchars($preparo);?></textarea>
            </div>
            <div>
                <button class="btn" name="submit" type="submit">Salvar receita</button>
                <!-- <p><?php var_dump($ingredientes)?></p> -->
            </div>
        </form>
    </div>
</section>
<?php include_once "templates/footer.php";?>

</html>