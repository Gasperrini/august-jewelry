<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Svetainės analizė</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="google_analytics">Google Analytics kodas</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Įveskite savo Google Analytics kodą"
                    id="google_analytics"
                    name="google_analytics"
                >{!! Config::get('settings.google_analytics') !!}</textarea>
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