@php
  $phone = SettingHelper::get_field('phone') ?: '';
  $email = SettingHelper::get_field('email_address') ?: '';
  $street = SettingHelper::get_field('address') ?: '';

  $newsOrgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'NewsMediaOrganization',
    '@id' => rtrim(url('/'), '/') . '/#organization',
    'name' => $websiteName,
    'url' => url('/'),
    'sameAs' => url('/'),
  ];

  if (!empty($logo)) {
    $newsOrgSchema['image'] = $logo;
  }

  if ($phone !== '') {
    $newsOrgSchema['telephone'] = $phone;
  }

  if ($email !== '') {
    $newsOrgSchema['email'] = $email;
  }

  if ($street !== '') {
    $newsOrgSchema['address'] = [
      '@type' => 'PostalAddress',
      'streetAddress' => $street,
      'addressLocality' => 'Kathmandu',
      'addressCountry' => 'NP',
    ];
  }
@endphp

<script type="application/ld+json">
{!! json_encode($newsOrgSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
