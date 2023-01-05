<h1>Clients List</h1>
<ul>

    <?php foreach($clients as $client) : ?>


    <li>
        <b>id: <?= $client['id'] ?></b>
        <?= $client['name'] ?>
        <?= $client['surname'] ?>
        <?= $client['personal_id'] ?>
        <?= $client['iban'] ?>
        <?= $client['balance'] ?> EUR
        <a href="<?= URL . 'clients/edit/'. $client['id'] ?>">Update</a>
        <form action="<?= URL . 'clients/delete/'. $client['id'] ?>" method="post">
            <button type="submit">Delete</button>
        </form>
    </li>


    <?php endforeach ?>


</ul>