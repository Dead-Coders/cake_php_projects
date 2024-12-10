<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeviceGroup[]|\Cake\Collection\CollectionInterface $deviceGroups
 * @var array $publishTopicPrefix
 * @var array $subscribeTopicPrefix
 * @var array $mqttMessages
 */
$this->assign('title', __('Smart Home Dashboard'));
?>
<div class="col">
<?= $this->Form->create(null, [
    'url' => [
        'controller' => 'DeviceGroups',
        'action' => 'add'
    ],
])?>
<div class="input-group">
    <?= $this->Form->text('name', [
        'class' => 'form-control',
        'placeholder' => __('Enter new group name...'),
        'aria-label' => __('Enter new group name...'),
        'aria-describedby' => 'button-search',
        'require' => true,
    ])?>
    <button class="btn btn-primary" id="button-search" type="submit"><?= __('Create New Group')?></button>
</div>
<?= $this->Form->end()?>
    <hr />
</div>
<?php foreach ($deviceGroups as $deviceGroup):
$addDeviceUrl = $this->Url->build([
    'controller' => 'Devices',
    'action' => 'add',
    $deviceGroup->id,
]);
?>
<div class="card mb-4">
  <div class="card-body">
    <h4 class="card-title"><?= h($deviceGroup->name)?></h4>
      <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($deviceGroup->devices as $device):?>
          <div class="col">
              <div class="card h-100">
                  <div class="card-body" style="text-align: center">
                      <div class="form-check form-switch pull-right">
                          <?= $this->Device->checkbox($device)?>
                      </div>
                      <div data-bs-toggle="modal" data-bs-target="#infoDevice<?= h($device->id)?>" style="cursor: pointer">
                        <?= $this->Device->image($device->type)?>
                      </div>
                      <h5 class="card-title mt-2"><?= h($device->name)?></h5>
                      <?= $this->Form->postLink(
                          '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>',
                          [
                              'controller' => 'Devices',
                              'action' => 'delete', $device->id
                          ],
                          [
                              'confirm' => __('Are you sure you want to delete # {0}?', $device->id),
                              'class' => 'btn btn-link text-danger',
                              'escapeTitle' => false,
                          ]
                      ) ?>
                  </div>
              </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="infoDevice<?= h($device->id)?>" tabindex="-1" aria-labelledby="infoDevice<?= h($device->id)?>Label" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="infoDevice<?= h($device->id)?>Label"><?= __('MQTT Info for: {0}',  $device->name)?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <p><strong><?= __('We send update using topic:')?></strong><br />
                          <span><?= $publishTopicPrefix?><?= ($device->id)?></span>
                          </p>
                          <p><strong><?= __('We subscribe change of topic: ')?></strong><br />
                              <span><?= $subscribeTopicPrefix?><?= ($device->id)?></span>
                          </p>
                          <hr />
                          <p><?= __('Valid message values are: {0}', $this->Text->toList($mqttMessages))?></p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= __('Got it')?></button>
                      </div>
                  </div>
              </div>
          </div>
      <?php endforeach;?>
          <div class="col">
              <div class="card h-100">
                  <a href="<?= $addDeviceUrl?>">
                  <div class="card-body mt-4" style="text-align: center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                      <h5 class="card-title mt-2"><?= __('Add New Device')?></h5>
                  </div>
                  </a>
              </div>
          </div>
      </div>
  </div>
</div>
<?php endforeach;?>
