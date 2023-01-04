<h1>Account edit</h1>

<form action="<?= URL ?>clients/update/<?= $client['id'] ?>" method="post">

    <div>Pavadinimas<input type="text" name="title" value="<?= $client['title'] ?>"></div>
    <div>Spalva<input type="text" name="color" value="<?= $client['color'] ?>"></div>
    <div>Svoris<input type="text" name="weight" value="<?= $client['weight'] ?>"></div>

    <button type="submit">Taip</button>

</form>