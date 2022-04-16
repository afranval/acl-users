<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<div class="col-lg-12">
    <div class="row px-3 pt-3 mt-2">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= $this->Url->build(['action'=>'index']) ?>">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit <?= strtoupper($role->name)?></li>
            </ol>
        </nav>
    </div>
    <div class="row p-3 my-0 justify-content-center">        
        <div class="col-lg-6">
            <?= $this->Form->create($role) ?>
            <legend><?= __('Edit Role') ?></legend>
            <div class="form-floating mb-3">
                <input type="text" value="<?= $role->name ?>" name="name" class="form-control" id="name" placeholder="User" required>
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="description" value="<?= $role->description ?>" name="description" class="form-control" id="floatingInput" placeholder="" required>
                <label for="floatingInput">Description</label>
            </div>
            <div class="col-12 ">
                <button type="submit" class="btn btn-warning w-100">Edit and save</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
