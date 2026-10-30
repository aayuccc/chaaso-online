<div class="tab-pane fade {{ request()->query('tab') == 'info-section' ? 'active show' : '' }}" id="info-section"
    role="tabpanel" aria-labelledby="info-section-tab">
    <div class="row">
        <div class="col">
            <label for="emailAddress" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="emailAddress" name="email_address"
                value="{{ isset($settings['email_address']) ? $settings['email_address'] : '' }}" />
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address"
                value="{{ isset($settings['address']) ? $settings['address'] : '' }}" />
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <label for="address" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone"
                value="{{ isset($settings['phone']) ? $settings['phone'] : '' }}" />
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook URL</label>
                <input type="url" class="form-control" id="facebook" name="facebook"
                    value="{{ isset($settings['facebook']) ? $settings['facebook'] : '' }}" />
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram URL</label>
                <input type="url" class="form-control" id="instagram" name="instagram"
                    value="{{ isset($settings['instagram']) ? $settings['instagram'] : '' }}" />
            </div>
        </div> --}}
        <div class="col-md-6">
            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter URL</label>
                <input type="url" class="form-control" id="twitter" name="twitter"
                    value="{{ isset($settings['twitter']) ? $settings['twitter'] : '' }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="linkedin" class="form-label">LinkedIn URL</label>
                <input type="url" class="form-control" id="linkedin" name="linkedin"
                    value="{{ isset($settings['linkedin']) ? $settings['linkedin'] : '' }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="youtube" class="form-label">YouTube URL</label>
                <input type="url" class="form-control" id="youtube" name="youtube"
                    value="{{ isset($settings['youtube']) ? $settings['youtube'] : '' }}" />
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="mb-3">
                <label for="tiktok" class="form-label">TikTok URL</label>
                <input type="url" class="form-control" id="tiktok" name="tiktok"
                    value="{{ isset($settings['tiktok']) ? $settings['tiktok'] : '' }}" />
            </div>
        </div> --}}
    </div>
    {{-- <div class="mb-3">
        <label for="map" class="form-label">Map</label>
        <textarea class="form-control" name="map_url" id="map_url" cols="30" rows="10">{{ isset($settings['map_url']) ? $settings['map_url'] : '' }}</textarea>
    </div> --}}
</div>
