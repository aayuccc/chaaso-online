{!! '<' . '?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
@foreach ($posts as $post)
    <url>
        <loc>{{ rtrim(route('frontend.post.index', $post->id), '/') . '/' }}</loc>
        <news:news>
            <news:publication>
                <news:name>{{ SettingHelper::get_field('site_title') }}</news:name>
            </news:publication>
            <news:publication_date>{{ $post->created_at->toIso8601String() }}</news:publication_date>
            <news:title>{{ $post->post_title }}</news:title>
        </news:news>
    </url>
@endforeach
</urlset>