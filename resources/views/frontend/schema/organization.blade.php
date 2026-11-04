@php
    $sameAs = array_values(array_filter([
        SettingHelper::get_field('facebook'),
        SettingHelper::get_field('instagram'),
        SettingHelper::get_field('youtube'),
        SettingHelper::get_field('linkedin'),
        SettingHelper::get_field('twitter'),
        SettingHelper::get_field('tiktok'),
    ]));

    $schemaData = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $websiteName,
        'url' => url('/'),
    ];

    if (!empty($logo)) {
        $schemaData['logo'] = $logo;
    }

    if (!empty($sameAs)) {
        $schemaData['sameAs'] = $sameAs;
    }
@endphp

<script type="application/ld+json">
    {!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
