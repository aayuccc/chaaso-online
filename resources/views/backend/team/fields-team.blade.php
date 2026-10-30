<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                    <h4 class="header-title">Single Team Builder</h4>
                </div>
                <div class="tab-heading">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a href="#general" data-bs-toggle="tab"
                                aria-expanded="{{ !request()->has('tab') || request()->query('tab') == 'general' ? 'true' : 'false' }}"
                                class="nav-link {{ !request()->has('tab') || request()->query('tab') == 'general' ? 'active' : '' }}">
                                General </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane {{ !request()->has('tab') || request()->query('tab') == 'general' ? 'show active' : '' }}"
                        id="general">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input name="designation" type="text" id="designation" class="form-control"
                                        value="{{ isset($metaDatas['designation']) && $metaDatas['designation'] ? $metaDatas['designation'] : '' }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="facebook" class="form-label">Facebook URL</label>
                                        <input type="url" class="form-control" id="facebook" name="facebook"
                                            value="{{ isset($settings['facebook']) ? $settings['facebook'] : '' }}" />
                                    </div>
                                </div>
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
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tiktok" class="form-label">TikTok URL</label>
                                        <input type="url" class="form-control" id="tiktok" name="tiktok"
                                            value="{{ isset($settings['tiktok']) ? $settings['tiktok'] : '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="team_email" class="form-label">Email Address</label>
                                        <input type="url" class="form-control" id="team_email" name="team_email"
                                            value="{{ isset($settings['team_email']) ? $settings['team_email'] : '' }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>