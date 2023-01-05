<div class="container">
    <div>
        <h2 class="main-title">Client List</h2>
    </div>
    <div class="table">
        <?php foreach($clients as $client) : ?>
        <div class="table1">
            <div class="content">
                <div>Id: <?= $client['id'] ?></div>
                <div class="width"> <?= $client['name'] ?> <?= $client['surname'] ?></div>
                <div><?= $client['personal_id'] ?></div>
                <div> <?= $client['iban'] ?> </div>
                <div><?= number_format($client['balance'], 2, '.', '')  ?> EUR</div>
            </div>
            <div class="buttons">
                <a class="btn" href="<?= URL . 'clients/deposit/'. $client['id'] ?>">Deposit</a>
                <a class="btn btn-light" href="<?= URL . 'clients/withdraw/'. $client['id'] ?>">Withdraw</a>
                <form action="<?= URL . 'clients/delete/'. $client['id'] ?>" method="post">
                    <button class="btn btn-delete" type="submit">Delete account</button>
                </form>
            </div>
        </div>
        <?php endforeach ?>

    </div>
</div>

</html>