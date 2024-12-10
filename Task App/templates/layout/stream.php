<turbo-stream action="replace" target="app-flash-messages">
    <template>
        <div id="app-flash-messages">
            <?= $this->Flash->render() ?>
        </div>
    </template>
</turbo-stream>
<?= $this->fetch('content') ?>
