<h1>Clients List</h1>
<ul>

    <?php foreach($clients as $client) : ?>


    <li>
        <b>id: <?= $client['id'] ?></b> <?= $client['title'] ?> <?= $client['color'] ?> <?= $client['weight'] ?>
        <a href="<?= URL . 'clients/edit/'. $client['id'] ?>">Redaguoti</a>
        <form action="<?= URL . 'clients/delete/'. $client['id'] ?>" method="post">
            <button type="submit">Trinti</button>
        </form>
    </li>


    <?php endforeach ?>


</ul>