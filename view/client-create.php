<?php

?>
<h1>New client</h1>

<form action="<?= URL ?>clients/save" method="post">

    <div>
        <label class="label-new">Name</label>
        <input class="input" type="text" name="name">
    </div>
    <div>
        <label>Surname</label>
        <input class="input" type="text" name="surname" class="">
    </div>
    <div>
        <label>Personal ID</label>
        <input class="input" type="text" name="personal_id" class="">
    </div>
    <div>
        <label>Account number (IBAN)</label>
        <input class="input" readonly name="iban" value=" " class="">
    </div>
    <div>
        <input type="hidden" class="input" name="balance" class="">
    </div>

    <button type=" submit">Create</button>

</form>