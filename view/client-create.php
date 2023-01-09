<div class="container">
    <div>
        <h2 class="main-title">Create new account</h2>
    </div>
    <div class="new">
        <form action="<?= URL ?>clients/save" method="post">
            <div class="flex div-line">
                <label class="label-new">Name</label>
                <!-- //padaryti input require!!!! -->
                <input class="input" type="text" name="name">
            </div>
            <div class="flex">
                <label>Surname</label>
                <input class="input" type="text" name="surname" class="" required>
            </div>
            <div class="flex">
                <label>Personal ID</label>
                <input class="input" type="text" name="personal_id" class="" required>
            </div>
            <div class="flex">
                <label>Account number (IBAN)</label>
                <input class="input" readonly name="iban" class="" value="<?= $client['iban'] ?>">
            </div>
            <div class="flex-center">
                <button type="submit" class="btn">Create</button>
            </div>
        </form>
    </div>
</div>
</div>