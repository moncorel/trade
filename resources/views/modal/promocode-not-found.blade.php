<div
    class="modal fade"
    id="promocodeNotFoundModal"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                @if(session('modal') === 'promocode_not_found')
                    <span class="alert-ico d-block text-center">
                        <i class="fas fa-exclamation-triangle attention font-4-rem"></i>
                    </span>
                    <p class="text-center text-white font-weight-bold font-16">Promocode not found!</p>
                @endif
            </div>
        </div>
    </div>
</div>

