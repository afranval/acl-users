<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="col-lg-12">
    <div class="row px-3 pt-3 my-2">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= $this->Url->build(['action'=>'index']) ?>">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">View</li>
            </ol>
        </nav>
    </div>
    <div class="row p-3 my-2 justify-content-center">
        <div class="col-lg-8">            
            <div class="table-responsive">  
                <h3>#<?= h($role->id) ?></h3>
                <table class="table table-bordered align-middle">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($role->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Description') ?></th>
                        <td><?= h($role->description) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row p-3 my-2 justify-content-center">
        <div class="col-lg-8">            
            <div class="table-responsive">  
                <h4><?= __('Related Users') ?></h4> 
                <?php if (!empty($role->users)): ?>
                <table class="table table-bordered" cellpadding="0" cellspacing="0">
                    <tr>
                        <th scope="col"><?= __('#') ?></th>
                        <th scope="col"><?= __('Username') ?></th>
                        <th scope="col"><?= __('Email') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($role->users as $users): ?>
                    <tr>
                        <td><?= h($users->id) ?></td>
                        <td><?= h($users->username) ?></td>
                        <td><?= h($users->email) ?></td>
                        <td class="actions">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="<?=$this->Url->Build(['controller'=>'Users','action'=>'view', $users->id])?>">View</a></li>
                                    <li><a class="dropdown-item" href="<?=$this->Url->Build(['controller'=>'Users','action'=>'edit', $users->id])?>">Edit</a></li>
                                    <li><span class="dropdown-item"><?= $this->Form->postLink(__('Delete'), ['controller'=>'Users','action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?></span></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
