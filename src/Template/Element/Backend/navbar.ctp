<nav class="top-bar expanded" data-topbar role="navigation">        
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
            <h1><a href="">ACL Manager - <?= $userSession->username ?> (<?= $userSession->role->name ?>)</a></h1>
        </li>
    </ul>
    
    <div class="top-bar-section">
        <ul class="right">
        <li><a href="<?= $this->Url->build([ 'controller' => 'Users', 'action' => 'logout' ]) ?>">Logout</a></li>
        </ul>
    </div>

</nav>