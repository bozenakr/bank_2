<h1>New client</h1>

<form action="<?= URL ?>clients/save" method="post">

    <div>Pavadinimas<input type="text" name="title"></div>
    <div>Spalva<input type="text" name="color"></div>
    <div>Svoris<input type="text" name="weight"></div>

    <button type="submit">Taip</button>

</form>