</body>
<footer>
    <div class="container">
        <div class="hide" style="with: 100%">
            <?php if(isset($message)) :?>
            <div class="alert text-center <?= $message['type'] ?>"><?= $message['text'] ?></div>
        </div>
    </div>
    <?php endif ?>
    </div>

</footer>

</html>