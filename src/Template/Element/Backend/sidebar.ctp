<nav class="bg-light" id="actions-sidebar">
    <div class="list-group">
        <a 
            href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>" 
            class="list-group-item list-group-item-action " 
            aria-current="true"            
        >
            List Users
        </a>
        <a 
            href="<?= $this->Url->build(['controller' => 'Roles', 'action' => 'index']) ?>" 
            class="list-group-item list-group-item-action <?= ($this->request->getParam('controller') == 'Roles') ? "active" : '' ?>"
        >
            List Roles
        </a>
    </div>
</nav>