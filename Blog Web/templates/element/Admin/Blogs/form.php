<?php
    $this->Html->css(['https://cdn.quilljs.com/1.3.6/quill.snow.css'], ['block' => true]);
    $this->Html->script(['https://cdn.quilljs.com/1.3.6/quill.js'], ['block' => true]);
?>
    <div class="blogs form content">
        <?= $this->Form->create($blog, [
            'id' => 'blogForm',
        ]) ?>
        <fieldset>
            <legend><?= $title ?></legend>
            <?php
            echo $this->Form->control('title');
            echo $this->Form->control('summary');
            ?>
            <!-- Create the editor container -->
            <div id="editor" style="min-height: 300px;" class="mb-3">
                <?= $blog->content?>
            </div>
            <?= $this->Form->control('published')?>
            <div style="display: none"><?= $this->Form->control('content', [
                    'required' => false,
                    'id' => 'blogContent',
                ]);?></div>
            <?php
            echo $this->Form->control('tags._ids', [
                'options' => $tags,
                'multiple' => 'checkbox',
            ]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>

<?php
$this->Html->scriptStart(['block' => true]);
?>
    //<script>
    var editor = new Quill('#editor', {
        theme: 'snow'
    });
    $('#blogForm').on("submit", function() {
        $('#blogContent').val(editor.root.innerHTML);
    })
    //</script>
<?php
$this->Html->scriptEnd();
?>
