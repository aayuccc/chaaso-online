<div class="mb-3">
    <div class="card">
        <div class="card-body">
            <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                <h4 class="header-title">About Page Builder</h4>
            </div>
            <div class="tab-heading">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#main-content" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            General
                        </a>
                    </li>

                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane show active" id="main-content">
                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Chief Editor Name</label>
                                <input type="text" name="chiefeditor_name" class="form-control"
                                    value="{{ isset($metaDatas['chiefeditor_name']) ? $metaDatas['chiefeditor_name'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Experience</label>
                                <input type="text" name="chiefeditor_exp" class="form-control"
                                    value="{{ isset($metaDatas['chiefeditor_exp']) ? $metaDatas['chiefeditor_exp'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Topic</label>
                                <input type="text" name="chiefeditor_topic" class="form-control"
                                    value="{{ isset($metaDatas['chiefeditor_topic']) ? $metaDatas['chiefeditor_topic'] : '' }}" />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Language</label>
                                <input type="text" name="chiefeditor_lang" class="form-control"
                                    value="{{ isset($metaDatas['chiefeditor_lang']) ? $metaDatas['chiefeditor_lang'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="facebook" class="form-label">Facebook URL</label>
                                <input type="url" class="form-control" id="facebook" name="facebook" value="{{ isset($settings['facebook']) ? $settings['facebook'] : '' }}" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="twitter" class="form-label">Twitter URL</label>
                                <input type="url" class="form-control" id="twitter" name="twitter" value="{{ isset($settings['twitter']) ? $settings['twitter'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="instagram" class="form-label">Instagram URL</label>
                                <input type="url" class="form-control" id="instagram" name="instagram" value="{{ isset($settings['instagram']) ? $settings['instagram'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="youtube" class="form-label">YouTube URL</label>
                                <input type="url" class="form-control" id="youtube" name="youtube" value="{{ isset($settings['youtube']) ? $settings['youtube'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tiktok" class="form-label">TikTok URL</label>
                                <input type="url" class="form-control" id="tiktok" name="tiktok" value="{{ isset($settings['tiktok']) ? $settings['tiktok'] : '' }}" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="team_email" class="form-label">Email Address</label>
                                <input type="url" class="form-control" id="team_email" name="team_email" value="{{ isset($settings['team_email']) ? $settings['team_email'] : '' }}" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>