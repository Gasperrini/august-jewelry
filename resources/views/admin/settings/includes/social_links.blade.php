<div class="tile">
    <form action="{{ route('admin.settings.update') }}" method="POST" role="form">
        @csrf
        <h3 class="tile-title">Socialiniai tinklai</h3>
        <hr>
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label" for="social_facebook">Facebook puslapis</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite nuorodą į savo Facebook puslapį"
                    id="social_facebook"
                    name="social_facebook"
                    value="{{ config('settings.social_facebook') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_twitter">Twitter puslapis</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite nuorodą į savo Twitter puslapį"
                    id="social_twitter"
                    name="social_twitter"
                    value="{{ config('settings.social_twitter') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_instagram">Instagram puslapis</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite nuorodą į savo Instagram puslapį"
                    id="social_instagram"
                    name="social_instagram"
                    value="{{ config('settings.social_instagram') }}"
                />
            </div>
            <div class="form-group">
                <label class="control-label" for="social_linkedin">LinkedIn puslapis</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Įveskite nuorodą į savo LinkedIn puslapį"
                    id="social_linkedin"
                    name="social_linkedin"
                    value="{{ config('settings.social_linkedin') }}"
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