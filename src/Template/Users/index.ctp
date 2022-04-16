<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="col-lg-12">
    <div class="row p-3 my-2">
        <div class="col-lg-12 table-responsive">
            <div class="d-flex flex-row ">
                <h2 class=""><?= __('Users') ?></h2>
                <div class="btn-group px-3">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Options
                    </button>
                    <ul class="dropdown-menu">                        
                        <?php if($this->checkByRole('admin')): ?> 
                            <li><a class="dropdown-item" href="<?=$this->Url->Build(['action'=>'add'])?>">Add user</a></li>                            
                        <?php endif ?>
                        <li><a class="dropdown-item" href="#search" id="search">Search user</a></li>
                    </ul>
                </div>
            </div> 
            <div class="d-flex flex-row my-3 p-3 bg-light" id="search-block" style="<?= @$get ? 'display:flex' : 'display:none !important' ?>">                
                <form method="GET" class="row" >
                    <div class="col">                        
                        <select class="form-select" name="role_id" id="floatingSelect" >
                            <option value="">Select role</option>
                            <?php foreach($roles as $id => $role): ?> 
                                <option value="<?= $id ?>" <?= @$get['role_id'] == $id ? 'selected': null ?> ><?= $role ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" name="username" value="<?= @$get['username'] ?>" class="form-control" placeholder="username" aria-label="username">
                    </div>
                    <div class="col">
                        <input type="text" name="email"  value="<?= @$get['email'] ?>" class="form-control" placeholder="email" aria-label="email">
                    </div>
                    <div class="col">
                        <button type="submit" name="search" value="true" class="btn btn-primary">Search</button>
                        <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-secondary">Reset</a>
                    </div>
                </form>
                
            </div>
            <table class="table table-hover mt-3" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                        <?php if($this->checkByRole('admin')): ?> 
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td>
                        <?php if($this->checkByRole('admin')): ?> 
                            <?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?>
                        <?php else: ?>
                            <?= $user->role->name ?>
                        <?php endif ?>
                        </td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->email) ?></td>                
                        <td><?= h($user->created) ?></td>
                        <td><?= h($user->modified) ?></td>
                        <?php if($this->checkByRole('admin')): ?> 
                        <td class="actions">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="<?=$this->Url->Build(['action'=>'view', $user->id])?>">View</a></li>
                                    <li><a class="dropdown-item" href="<?=$this->Url->Build(['action'=>'edit', $user->id])?>">Edit</a></li>
                                    <li><span class="dropdown-item"><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></span></li>
                                </ul>
                            </div>
                        </td>
                        <?php endif ?>
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
<script>
    // search-box showing
    document.getElementById("search").onclick = (e) => {        
        document.getElementById("search-block").style.display = "flex";
    };
</script>
