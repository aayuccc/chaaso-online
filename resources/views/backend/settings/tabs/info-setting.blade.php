<div class="tab-pane fade {{ request()->query('tab') == 'info-section' ? 'active show' : '' }}" id="info-section"
    role="tabpanel" aria-labelledby="info-section-tab">
    <div class="row">
        <div class="col-4">
            <label for="emailAddress" class="form-label">Main Email Address</label>
            <input type="email" class="form-control" id="emailAddress" name="email_address"
                value="{{ isset($settings['email_address']) ? $settings['email_address'] : '' }}" />
        </div>

        <div class="col-4">
            <label for="adv_emailAddress" class="form-label">Advertisement's Email Address</label>
            <input type="email" class="form-control" id="adv_emailAddress" name="adv_email_address"
                value="{{ isset($settings['adv_email_address']) ? $settings['adv_email_address'] : '' }}" />
        </div>

        <div class="col-4">
            <label for="complaint_emailAddress" class="form-label">Complaint's Email Address</label>
            <input type="email" class="form-control" id="complaint_emailAddress" name="complaint_email_address"
                value="{{ isset($settings['complaint_email_address']) ? $settings['complaint_email_address'] : '' }}" />
        </div>

    </div>
    <hr />
    <div class="row">
        <div class="col-4">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address"
                value="{{ isset($settings['address']) ? $settings['address'] : '' }}" />
        </div>
        <div class="col-4">
            <label for="working_hour" class="form-label">Working Hour</label>
            <input type="text" class="form-control" id="working_hour" name="working_hour"
                value="{{ isset($settings['working_hour']) ? $settings['working_hour'] : '' }}" />
        </div>
        <div class="col-4">
            <label for="resgitration_number" class="form-label">Registration Number</label>
            <input type="text" class="form-control" id="resgitration_number" name="resgitration_number"
                value="{{ isset($settings['resgitration_number']) ? $settings['resgitration_number'] : '' }}" />
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
                <label for="instagram" class="form-label">Instagram URL</label>
                <input type="url" class="form-control" id="instagram" name="instagram"
                    value="{{ isset($settings['instagram']) ? $settings['instagram'] : '' }}" />
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
    <div class="mb-3">
        <label for="map" class="form-label">Map</label>
        <textarea class="form-control" name="map_url" id="map_url" cols="30" rows="3">{{ isset($settings['map_url']) ? $settings['map_url'] : '' }}</textarea>
    </div>
</div>
