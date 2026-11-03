<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2 d-flex align-content-center border-1 border-bottom">
                    <h4 class="header-title">Single Post Builder</h4>
                </div>
                <div class="tab-heading">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item">
                            <a href="#general" data-bs-toggle="tab"
                                aria-expanded="{{ !request()->has('tab') || request()->query('tab') == 'general' ? 'true' : 'false' }}"
                                class="nav-link {{ !request()->has('tab') || request()->query('tab') == 'general' ? 'active' : '' }}">
                                General
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#breaking-news" data-bs-toggle="tab"
                                aria-expanded="{{ request()->query('tab') == 'breaking-news' ? 'true' : 'false' }}"
                                class="nav-link {{ request()->query('tab') == 'breaking-news' ? 'active' : '' }}">
                                Breaking News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#wiki" data-bs-toggle="tab"
                                aria-expanded="{{ request()->query('tab') == 'wiki' ? 'true' : 'false' }}"
                                class="nav-link {{ request()->query('tab') == 'wiki' ? 'active' : '' }}">
                                Wiki
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#video" data-bs-toggle="tab"
                                aria-expanded="{{ request()->query('tab') == 'video' ? 'true' : 'false' }}"
                                class="nav-link {{ request()->query('tab') == 'video' ? 'active' : '' }}">
                                Video
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade {{ !request()->has('tab') || request()->query('tab') === 'general' ? 'active show' : '' }}"
                        id="general" role="tabpanel">
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Short Description</label>
                                <textarea name="short_desc" class="form-control" rows="2">{{ $metaDatas['short_desc'] ?? '' }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Summary</label>
                                <textarea name="summary" class="form-control editor" rows="2">{{ $metaDatas['summary'] ?? '' }}</textarea>
                            </div>

                        </div>

                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div
                                    class="d-flex align-items-center justify-content-between border rounded-3 px-3 py-3 bg-light-subtle">
                                    <div>
                                        <label for="show_banner" class="form-label fw-semibold mb-1">Show Image on
                                            Banner News</label>
                                        <p class="text-muted mb-0 small">Enable this to display the image in homepage's featured section.</p>
                                    </div>
                                    <div class="form-check form-switch mb-0">
                                        <input type="checkbox" class="form-check-input" id="show_banner"
                                            name="show_banner" value="1"
                                            {{ isset($metaDatas['show_banner']) && $metaDatas['show_banner'] == 1 ? 'checked' : '' }}
                                            style="width: 3rem; height: 1.5rem; cursor: pointer;" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div
                                    class="d-flex align-items-center justify-content-between border rounded-3 px-3 py-3 bg-light-subtle">
                                    <div>
                                        <label for="show_front" class="form-label fw-semibold mb-1">Show On Front</label>
                                        <p class="text-muted mb-0 small">Enable this to display this post in homepage's featured section.</p>
                                    </div>
                                    <div class="form-check form-switch mb-0">
                                        <input type="checkbox" class="form-check-input" id="show_front"
                                            name="show_front" value="1"
                                            {{ isset($metaDatas['show_front']) && $metaDatas['show_front'] == 1 ? 'checked' : '' }}
                                            style="width: 3rem; height: 1.5rem; cursor: pointer;" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center justify-content-between border rounded-3 px-3 py-3 bg-light-subtle">
                                    <div>
                                        <label for="use_video" class="form-label fw-semibold mb-1">Use Video</label>
                                        <p class="text-muted mb-0 small">Enable this to display a video for this post.</p>
                                    </div>
                                    <div class="form-check form-switch mb-0">
                                        <input type="checkbox" class="form-check-input" id="use_video"
                                            name="use_video" value="1"
                                            {{ isset($metaDatas['use_video']) && $metaDatas['use_video'] == 1 ? 'checked' : '' }}
                                            style="width: 3rem; height: 1.5rem; cursor: pointer;" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" id="youtube_video_wrapper"
                                style="{{ isset($metaDatas['use_video']) && $metaDatas['use_video'] == 1 ? '' : 'display: none;' }}">
                                <div class="mb-3">
                                    <label class="form-label" for="youtube_video_id">Youtube Video ID</label>
                                    <input name="youtube_video_id" type="text" class="form-control"
                                        id="youtube_video_id"
                                        value="{{ $metaDatas['youtube_video_id'] ?? '' }}">
                                    <small class="text-muted">Enter the video ID (e.g., dsGuSZYDNmk)</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const useVideo = document.getElementById('use_video');
        const youtubeWrapper = document.getElementById('youtube_video_wrapper');
        function toggleYoutubeField() {
            youtubeWrapper.style.display = useVideo.checked ? '' : 'none';
        }
        useVideo.addEventListener('change', toggleYoutubeField);
        // Set initial visibility
        toggleYoutubeField();
    });
</script>
