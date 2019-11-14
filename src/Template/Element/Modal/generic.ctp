<div class="modal fade" id="<?= $eId?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?= $eId?>ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="<?= $eId?>ModalLabel"><?= $title?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div id="<?= $eId?>ModalText" class="modal-body"><?= $text?></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="/users/logout">Logout</a>
            </div>
        </div>
    </div>
</div>
