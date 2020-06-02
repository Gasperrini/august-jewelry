<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Mokėjimai</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="stripe_payment_method">Stripe mokėjimo metodas</label>
                <select name="stripe_payment_method" id="stripe_payment_method" class="form-control">
                    <option value="1" {{ (config('settings.stripe_payment_method')) == 1 ? 'selected' : '' }}>Įjungtas</option>
                    <option value="0" {{ (config('settings.stripe_payment_method')) == 0 ? 'selected' : '' }}>Išjungtas</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="stripe_key">Raktas</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite Stripe raktą"
                    id="stripe_key"
                    name="stripe_key"
                    value="{{ config('settings.stripe_key') }}"
                />
            </div>
            <div class="form-group pb-2">
                <label class="control-label" for="stripe_secret_key">Slaptas raktas</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite Stripe slaptą raktą"
                    id="stripe_secret_key"
                    name="stripe_secret_key"
                    value="{{ config('settings.stripe_secret_key') }}"
                />
            </div>
            <hr>
            <div class="form-group pt-2">
                <label class="control-label" for="paypal_payment_method">PayPal mokėjimo metodas</label>
                <select name="paypal_payment_method" id="paypal_payment_method" class="form-control">
                    <option value="1" {{ (config('settings.paypal_payment_method')) == 1 ? 'selected' : '' }}>Įjungtas</option>
                    <option value="0" {{ (config('settings.paypal_payment_method')) == 0 ? 'selected' : '' }}>Išjungtas</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="paypal_client_id">Kliento ID</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite kliento ID"
                    id="paypal_client_id"
                    name="paypal_client_id"
                    value="{{ config('settings.paypal_client_id') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="paypal_secret_id">Slaptas ID</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite slaptą ID"
                    id="paypal_secret_id"
                    name="paypal_secret_id"
                    value="{{ config('settings.paypal_secret_id') }}"
                />
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Atnaujinti nustatymus</button>
                </div>
            </div>
        </div>
    </form>
</div>