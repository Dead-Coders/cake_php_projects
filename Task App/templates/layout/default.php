<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->Html->css(['bootstrap.min.css']) ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script(['bootstrap.bundle.min.js']) ?>
    <?= $this->Html->script(['https://unpkg.com/@hotwired/turbo@7.1.0/dist/turbo.es2017-umd.js']) ?>
    <?= $this->fetch('script') ?>
    <style>
        .card a, .card .card-header button, .card .card-header button:hover{
            color: white;
            padding: 0;
        }
        .btn-complete {
            color: white;
            line-height: 1;
            padding: 0;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<div class="col-lg-12 mx-auto p-3 py-md-5">
    <main>
        <div class="row">
            <div id="app-flash-messages">
                <?= $this->Flash->render() ?>
            </div>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer class="pt-5 my-5 text-muted border-top">
        One Project a Day - with CakePHP
    </footer>
</div>
</body>
</html>
