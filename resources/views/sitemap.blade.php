<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{url('/')}}</loc>
        <lastmod>{{date('Y-m-d')}}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    @foreach ($Product as $product)
        <url>
            <loc>{{ url('/') }}/post/{{ $product->slung }}</loc>
            <lastmod>{{ $product->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
