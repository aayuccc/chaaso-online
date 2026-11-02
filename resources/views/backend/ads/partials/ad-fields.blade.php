{{--
    Standard 6-field ad block.
    Params: $label, $keys = ['brand','title','subtitle','img','url','cta']  (meta keys)
--}}
<label class="form-label" style="margin-top: 20px;">{{ $label }}</label>
<div class="row" style="background-color: #b3b9c01c; padding: 20px; border-radius: 10px;">
    @include('backend.ads.partials.image-picker', ['field' => $keys['brand'], 'label' => 'Brand Logo'])

    <div class="mb-3 col-4">
        <label class="form-label">Title</label>
        <input type="text" name="{{ $keys['title'] }}" class="form-control" value="{{ $metaDatas[$keys['title']] ?? '' }}" />
    </div>

    <div class="mb-3 col-4">
        <label class="form-label">Subtitle</label>
        <textarea name="{{ $keys['subtitle'] }}" class="form-control" rows="2">{{ $metaDatas[$keys['subtitle']] ?? '' }}</textarea>
    </div>

    @include('backend.ads.partials.image-picker', ['field' => $keys['img'], 'label' => 'Ad Image'])

    <div class="mb-3 col-4">
        <label class="form-label">Button URL</label>
        <input type="url" id="{{ $keys['url'] }}" class="form-control mb-3" name="{{ $keys['url'] }}" value="{{ $metaDatas[$keys['url']] ?? '' }}">
    </div>

    <div class="mb-3 col-4">
        <label class="form-label">Button Text</label>
        <input type="text" id="{{ $keys['cta'] }}" class="form-control" name="{{ $keys['cta'] }}" value="{{ $metaDatas[$keys['cta']] ?? '' }}" placeholder="Read More">
    </div>
</div>