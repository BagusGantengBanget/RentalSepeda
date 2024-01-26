<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p>Paid Type</p>
                    <select name="type" class="form-control">
                        <option disabled selected> -- Pilih Salah Satu -- </option>
                        <option value="dp">DP</option>
                        <option value="repayment">Repayment</option>
                    </select>
                </div>

                <div class="form-group">
                    <p>Jumlah Bayar</p>
                    <input type="number" name="amount" class="form-control" value="{{ old('amount') }}">
                </div>

                <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
            </div>
        </div>
    </div>
</div>