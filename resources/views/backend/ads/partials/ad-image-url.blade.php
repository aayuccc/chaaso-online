{{-- Simple ad block: image + URL. Params: $label, $img (image meta key), $url (url meta key) --}}
<label class="form-label" style="margin-top: 20px;">{{ $label }}</label>
<div class="row" style="background-color: #b3b9c01c; padding: 20px 20px 0; border-radius: 10px;">
    @include('backend.ads.partials.image-picker', ['field' => $img, 'label' => 'Ad Image', 'col' => 'col-6'])

    <div class="mb-3 col-6">
        <label for="{{ $url }}" class="form-label">Ad URL</label>
        <input type="url" class="form-control" id="{{ $url }}" name="{{ $url }}" value="{{ $metaDatas[$url] ?? '' }}" />
    </div>
</div>