<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div class="col-lg-12">
    <div class="row p-3 my-2">
        <div class="col-lg-12 table-responsive">
            <div class="d-flex flex-row ">
                <h2 class=""><?= __('Roles') ?></h2>
            </div>
            <table class="table table-hover mt-3" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $role): ?>
                    <tr>
                        <td><?= $this->Number->format($role->id) ?></td>
                        <td><?= h($role->name) ?></td>
                        <td><?= h($role->description) ?></td>
                        <td class="actions">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="<?=$this->Url->Build(['action'=>'view', $role->id])?>">View</a></li>
                                    <li><a class="dropdown-item" href="<?=$this->Url->Build(['action'=>'edit', $role->id])?>">Edit</a></li>
                                    <!-- <li><span class="dropdown-item"><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?></span></li> -->
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if(@$this->Paginator->params()['page'] > 1): ?>
            <nav aria-label="Page navigation example text-center">
                <ul class="pagination text-center">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p class="text-sm"><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </nav>
            <?php endif; ?>
        </div>
    </div>
</div>
