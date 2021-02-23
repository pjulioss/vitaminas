<?php include_once "templates/header.php";?>

<?php
if (isset($_POST['submit'])) {
    echo $_POST['name'];
}

?>

<h4 class="text-center mb-3 mt-3">Nova vitamina</h4>

<section class="container-fluid mt-3">
    <form action="add.php" method="POST">
        <div class="row">
            <div class="col mb-3">
                <label for="name" class="form-label">Seu email</label>
                <input type="email" name="email" class="form-control" placeholder="ex: fulano@email.com">
            </div>
            <div class="col mb-3">
                <label for="name" class="form-label">Nome da vitamina</label>
                <input type="text" name="name" class="form-control" placeholder="ex: Banana e mel">
            </div>
        </div>
        <div class="mb-3">
            <label for="ingredientes" class="form-label">Ingredientes</label>
            <textarea name="ingredientes" class="form-control" placeholder="separe os ingredientes por vírgula"
                rows="3"></textarea>
        </div>
        <div class="">
            <button class="btn" type="submit">Salvar receita</button>
        </div>
    </form>
</section>
<?php include_once "templates/footer.php";?>