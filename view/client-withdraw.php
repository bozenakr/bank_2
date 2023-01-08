<div class="container">
    <div>
        <h2 class="main-title">Money withdraw</h2>
    </div>
    <div class="div-line">
        <div class="text">
            <div> <?=$client['name']?> <?=$client['surname']?> <p> Account balance: <?= number_format($client['balance'], 2, '.', '') ?> EUR</p>
            </div>
        </div>
        <div class="form">
            <form action="<?= URL ?>clients/update/<?= $client['id'] ?>/withdraw" method="post">
                <input class="input" type="text" name="naujaSuma">
                <button class="btn btn-margin" type="submit">Withdraw</button>
        </div>
        </form>
    </div>
    <!-- <?php if (isset($error)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
    <?php endif ?> -->
</div>