<div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    id="depositModal"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deposit #{{ session('deposit')['number'] }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="col-md-12 mb-4 text-center">
                    <p class="my-0 deposit-text">Send exactly {{ session('deposit')['amount'] }} at</p>
                    <input
                        type='text'
                        class="form-control"
                        readonly
                        value='{{ session('deposit')['external_address'] }}'
                    />
                </div>
                <div class="row mx-0">
                    <div class="col-md-8">
                            <span class='bottom-text'>
                                Your payment will be completed after confirmation by the network.
                                Confirmation time may vary and depends on the Commission
                            </span>
                    </div>
                    <div class="col-md-4">
                        <img
                            src={{ 'https://api.qrserver.com/v1/create-qr-code/?data='.session('deposit')['external_address'].'&size=100x100' }}
                            width='100px'
                            height='100px'
                            alt="qr-code-external-address"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#depositModal').modal('show');
    })
</script>
