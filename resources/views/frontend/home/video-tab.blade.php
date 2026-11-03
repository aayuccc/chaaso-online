    @php
      // only posts that have a youtube id can be played
      $videos = $video_posts->filter(fn($p) => $p->postMeta->firstWhere('meta_key', 'youtube_video_id')?->meta_value)->values();
    @endphp
    @if ($videos->isNotEmpty())
    @php $first = $videos->first(); @endphp
    <section class="co-section co-video">
      <div class="container co-container">
        <div class="co-section-head">
          <h2 class="co-section-title">{{ $video_cat->name }}</h2><span class="co-hatch"></span>
          <a href="{{ $catUrl($video_cat) }}" class="co-more">सबै भिडियो <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="co-video-grid">
          <!-- Each playlist item: data-youtube="VIDEO_ID" + data-date. Play opens the popup player. -->
          <div class="co-video-player" id="coVideoPlayer">
            <img src="{{ $img($first) }}" alt="" class="co-video-thumb">
            <button class="co-video-play" type="button" aria-label="भिडियो हेर्नुहोस्"><i
                class="bi bi-play-fill"></i></button>
            <div class="co-overlay-body">
              <span class="co-tag co-tag-red">{{ $video_cat->name }}</span>
              <h3 class="co-mark-title co-mark-lg"><span class="co-mark co-video-title">{{ $first->post_title }}</span></h3>
            </div>
          </div>
          <div class="co-playlist">
            @foreach ($videos as $p)
              <button class="co-playlist-item {{ $loop->first ? 'is-active' : '' }}" type="button" data-date="{{ $date($p) }}" data-thumb="{{ $img($p) }}"
                data-youtube="{{ $p->postMeta->firstWhere('meta_key', 'youtube_video_id')->meta_value }}">
                <span class="co-playlist-thumb"><img src="{{ $img($p) }}" alt="" loading="lazy"><i
                    class="bi bi-play-circle-fill"></i></span>
                <span class="co-playlist-title">{{ $p->post_title }}</span>
              </button>
            @endforeach
          </div>
        </div>
      </div>
    </section>
    @endif


        <!-- Video popup: opened from the video section's play button, list is built from the playlist -->
    <dialog class="co-vmodal" id="coVideoModal" aria-labelledby="coVmTitle">
      <div class="co-vm">
        <div class="co-vm-main">
          <div class="co-vm-frame" id="coVmFrame"></div>
          <div class="co-vm-info">
            <div class="co-vm-meta">
              <span class="co-vm-live"><i class="bi bi-play-btn-fill"></i> चासो TV</span>
              <span id="coVmDate"></span>
            </div>
            <h2 class="co-vm-title" id="coVmTitle"></h2>
            <div class="co-vm-actions">
              <a href="#" class="co-vm-act" aria-label="Facebook मा सेयर गर्नुहोस्"><i class="bi bi-facebook"></i></a>
              <a href="#" class="co-vm-act" aria-label="X मा सेयर गर्नुहोस्"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="co-vm-act" aria-label="WhatsApp मा सेयर गर्नुहोस्"><i class="bi bi-whatsapp"></i></a>
              <button type="button" class="co-vm-act co-vm-copy" id="coVmCopy" aria-label="लिङ्क कपी गर्नुहोस्"><i class="bi bi-link-45deg"></i><span>कपी भयो</span></button>
              <a href="#" class="co-vm-yt" id="coVmYt" target="_blank" rel="noopener"><i class="bi bi-youtube"></i> YouTube मा हेर्नुहोस्</a>
            </div>
          </div>
        </div>
        <aside class="co-vm-side">
          <div class="co-vm-side-head">
            <strong>अन्य भिडियो</strong>
            <span id="coVmCount"></span>
            <button type="button" class="co-vm-close" data-vm-close aria-label="बन्द गर्नुहोस्" autofocus><i class="bi bi-x-lg"></i></button>
          </div>
          <div class="co-vm-list" id="coVmList"></div>
        </aside>
      </div>
    </dialog>