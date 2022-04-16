<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="col-lg-12">
    <div class="row px-3 pt-3 mt-2">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= $this->Url->build(['action'=>'index']) ?>">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add user</li>
            </ol>
        </nav>
    </div>
    <div class="row p-3 my-0 justify-content-center">        
        <div class="col-lg-6">
            <!-- Flash errors -->
            <?php if(!empty($errors)): ?>
            <div class="d-flex flex-column">
                <div class="alert alert-danger">
                    <?php foreach($errors as $field =>$error): ?>
                        <span class="text-capitalize"><?=$field?></span>
                        <ul>                            
                            <?php foreach($error as $msg): ?>
                                <li><?= $msg ?></li>
                            <?php endforeach ?>
                        </ul>
                    <?php endforeach ?>
                </div>
            </div>
            <?php endif ?>
            
            <!-- Forms -->
            <?= $this->Form->create($user) ?>
            <legend><?= __('Add User') ?></legend>
            <div class="form-floating mb-3">
                <select class="form-select" name="role_id" id="floatingSelect" aria-label="Floating label select example" required>
                    <?php foreach($roles as $id => $role): ?> 
                        <option value="<?= $id ?>"  ><?= $role ?></option>
                    <?php endforeach ?>
                </select>
                <label for="floatingSelect">Rol</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text"  name="username" class="form-control" id="username" placeholder="User" required autocomplete="off">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email"  name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required autocomplete="off">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required autocomplete="off">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="col-12 ">
                <button type="submit" class="btn btn-success w-100">Create and save</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>