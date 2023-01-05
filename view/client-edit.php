<h1>Account edit</h1>

<form action="<?= URL ?>clients/update/<?= $client['id'] ?>" method="post">

    <div>Name <?= $client['name'] ?></div>
    <div>Surname <?= $client['surname'] ?></div>
    <div>Balance <?= $client['balance'] ?></div>

    <div>Amount<input type="text" name="newDeposit"></div>
    <button type="submit">Deposit</button>

    <div>Amount<input type="text" name="newWithdraw"></div>
    <button type="submit">Withdraw</button>

</form>