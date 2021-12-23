<?php
$controller = $this->request->getParam('controller');
$action = $this->request->getParam('action');
$active = $show = '';
?>


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-balance-scale-left"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIRS</div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="/"></a>
    <li class="nav-item close-menu <?= $active ?>"><?= $this->Html->link('<i class="fas fa-fw fa-user-friends"></i> <span>' . __('Pessoas') . '</span>', '/pessoas/index', ['class' => ['nav-link'], 'escape' => false]) ?> </li>
    <li class="nav-item close-menu <?= $active ?>"><?= $this->Html->link('<i class="fas fa-fw fa-balance-scale-left"></i> <span>' . __('Processos') . '</span>', '/processos', ['class' => ['nav-link'], 'escape' => false]) ?> </li>
    <li class="nav-item close-menu <?= $active ?>"><?= $this->Html->link('<i class="fas fa-fw fa-book"></i> <span>' . __('Pedidos') . '</span>', '/pedidos/index', ['class' => ['nav-link'], 'escape' => false]) ?> </li>
    <li class="nav-item close-menu">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseAplicacoes" aria-expanded="true">
            <i class="far fa-fw fa-file-alt"></i>
            <span><?= __('Aplicações') ?></span>
        </a>
        <div id="collapseAplicacoes" class="collapse hide" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" data-toggle="collapse" data-target="#collapseSeguros" aria-expanded="true">
                    <span><?= __('Seguros') ?></span>
                </a>
                <div id="collapseSeguros" class="collapse hide">
                    <?= $this->Html->link(__('Penal'), '/formularios/index', ['class' => ['collapse-item'], 'escape' => false]); ?>
                    <?= $this->Html->link(__('Tutelar educativo'), '', ['class' => ['collapse-item'], 'escape' => false]); ?>
                </div>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <?php
    if ($this->Acl->hasAccess('/accesses/admin') || $this->Acl->hasAccess('/attempts/admin') || $this->Acl->hasAccess('/AclManager')) :
        $active = $aAclManager = $aAccesses = $aAttempts = '';
        if ($controller == 'Accesses' && $action == 'admin') {
            $aAccesses = $active = 'active';
            $show = 'show';
        } else if ($controller == 'Acl') {
            $aAclManager = $active = 'active';
            $show = 'show';
        } else if ($controller == 'Attempts' && $action == 'admin') {
            $aAttempts = $active = 'active';
            $show = 'show';
        }
        $acesses = $this->Acl->link(__('Accesses'), '/accesses/admin', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]);
        $attempts = $this->Acl->link(__('Attempts'), '/attempts/admin', ['class' => ['collapse-item ' . $aAttempts], 'escape' => false]);
        $aclManager = $this->Acl->link(__('Acl Manager'), '/AclManager', ['class' => ['collapse-item ' . $aAclManager], 'escape' => false]);
    ?>
        <li class="nav-item active">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminMenu2" aria-expanded="true" aria-controls="collapseAdminMenu">
                <i class="fas fa-fw fa-toolbox"></i>
                <span><?= __('Configuração') ?></span>
            </a>
            <div id="collapseAdminMenu2" class="collapse hide" aria-labelledby="adminMenu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <?= $this->Html->link(__('Caracteristicas Operativas'), '', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?> -->
                    <?= $this->Html->link(__('Entidades Judiciais'), '/entidadejudiciais/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                    <?= $this->Html->link(__('Equipas'), '/teams/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                    <?= $this->Html->link(__('Estados'), '/states/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                    <?= $this->Html->link(__('Motivos de Pedidos'), '/pedidosmotives/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                    <?= $this->Html->link(__('Naturezas'), '/naturezas/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                    <?= $this->Html->link(__('Perfil de Utilizador'), '/user-perfis/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                    <?= $this->Html->link(__('Perfis'), '/perfis/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                    <?= $this->Html->link(__('Tipos de Crimes'), '/tipocrimes/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                    <?= $this->Html->link(__('Tipos de Pedidos'), '/pedidostypes/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                    <!-- <?= $this->Html->link(__('Unidades Operativas'), '', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?> -->
                    <?= $this->Html->link(__('Unidades Orgânicas'), '/units/index', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]); ?>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <?php
    if ($this->Acl->hasAccess('/accesses/admin') || $this->Acl->hasAccess('/attempts/admin') || $this->Acl->hasAccess('/AclManager')) :
        $active = $aAclManager = $aAccesses = $aAttempts = '';
        if ($controller == 'Accesses' && $action == 'admin') {
            $aAccesses = $active = 'active';
            $show = 'show';
        } else if ($controller == 'Acl') {
            $aAclManager = $active = 'active';
            $show = 'show';
        } else if ($controller == 'Attempts' && $action == 'admin') {
            $aAttempts = $active = 'active';
            $show = 'show';
        }
        $acesses = $this->Acl->link(__('Accesses'), '/accesses/admin', ['class' => ['collapse-item ' . $aAccesses], 'escape' => false]);
        $attempts = $this->Acl->link(__('Attempts'), '/attempts/admin', ['class' => ['collapse-item ' . $aAttempts], 'escape' => false]);
        $aclManager = $this->Acl->link(__('Acl Manager'), '/AclManager', ['class' => ['collapse-item ' . $aAclManager], 'escape' => false]);
        $users = $this->Acl->link(__('Utilizadores'), '/users', ['class' => ['collapse-item ' . $aAclManager], 'escape' => false]);
    ?>
        <li class="nav-item <?= $active ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminMenu" aria-expanded="true" aria-controls="collapseAdminMenu">
                <i class="fas fa-fw fa-cog"></i>
                <span><?= __('Administração') ?></span>
            </a>
            <div id="collapseAdminMenu" class="collapse hide" aria-labelledby="adminMenu" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?= $acesses ?>
                    <?= $attempts ?>
                    <?= $aclManager ?>
                    <?= $users ?>
                </div>
            </div>
        </li>
    <?php endif; ?>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<script src="/js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".collapse").on("shown.bs.collapse", function() {
            localStorage.setItem("coll_" + this.id, true);
        });

        $(".collapse").on("hidden.bs.collapse", function() {
            localStorage.removeItem("coll_" + this.id);
        });

        $(".collapse").each(function() {
            if (localStorage.getItem("coll_" + this.id) === "true") {
                $(this).collapse("show");
            } else {
                $(this).collapse("hide");
            }
        });

        $(".close-menu").click(function() {
            if (localStorage.getItem("coll_collapseAdminMenu2") || localStorage.getItem("coll_collapseAdminMenu") || localStorage.getItem("coll_collapseAplicacoes") || localStorage.getItem("coll_collapseSeguros") ) localStorage.clear();
        });
    });
</script>