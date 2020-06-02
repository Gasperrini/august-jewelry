<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Bendri nustatymai</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="site_name">Svetainės pavadinimas</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite svetainės pavadinimą"
                    id="site_name"
                    name="site_name"
                    value="{{ config('settings.site_name') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="site_title">Svetainės trumpas pavadinimas</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite svetainės trumpą pavadinimą"
                    id="site_title"
                    name="site_title"
                    value="{{ config('settings.site_title') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="default_email_address">Numatytasis el. paštas</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Įveskite numatytąjį el. paštą"
                    id="default_email_address"
                    name="default_email_address"
                    value="{{ config('settings.default_email_address') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_code">Valiutos kodas</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite valiutos kodą"
                    id="currency_code"
                    name="currency_code"
                    value="{{ config('settings.currency_code') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="currency_symbol">Valiutos simbolis</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite valiutos simbolį"
                    id="currency_symbol"
                    name="currency_symbol"
                    value="{{ config('settings.currency_symbol') }}"
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