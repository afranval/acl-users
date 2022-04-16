<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a href="" class="navbar-brand">
            ACL Manager - <?= $userSession->username ?> (<?= $userSession->role->name ?>)
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <?php if($this->checkByRole('admin')): ?> 
                    <li class="nav-item">
                        <a 
                            class="nav-link <?= ($this->request->getParam('controller') == 'Users') ? "active" : '' ?>" 
                            aria-current="page" 
                            href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>"
                        >
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a 
                            class="nav-link <?= ($this->request->getParam('controller') == 'Roles') ? "active" : '' ?>" 
                            href="<?= $this->Url->build(['controller' => 'Roles', 'action' => 'index']) ?>" 
                        >
                            Roles
                        </a>
                    </li>                
                <?php endif; ?>
                <li class="nav-item">
                    <div class="d-flex">
                        <a href="<?= $this->Url->build([ 'controller' => 'Users', 'action' => 'logout' ]) ?>" class="btn btn-outline-light" >Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>