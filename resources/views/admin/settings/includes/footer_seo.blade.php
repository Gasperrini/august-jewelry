<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">SEO</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="footer_copyright_text">Apatinės paraštės tekstas</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Įveskite apatinės paraštės tekstą"
                    id="footer_copyright_text"
                    name="footer_copyright_text"
                >{{ config('settings.footer_copyright_text') }}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label" for="seo_meta_title">SEO Meta Pavadinimas</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite SEO Meta pavadinimą"
                    id="seo_meta_title"
                    name="seo_meta_title"
                    value="{{ config('settings.seo_meta_title') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="seo_meta_description">SEO Meta Aprašymas</label>
                <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Įveskite SEO Meta aprašymą"
                    id="seo_meta_description"
                    name="seo_meta_description"
                >{{ config('settings.seo_meta_description') }}</textarea>
            </div>
        </div>
        <div class="tile-footer">
            <div class="row d-print-none mt-2">
                <div class="col-12 text-right">
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Atanujinti nustatymus</button>
                </div>
            </div>
        </div>
    </form>
</div>