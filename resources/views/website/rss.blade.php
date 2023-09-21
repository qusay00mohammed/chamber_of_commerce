
<?PHP '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL ?>


<rss version="2.0">
    <channel>
        <title><![CDATA[الغرفة التجارية]]></title>
        <link><![CDATA[https://sparkerx.com]]></link>
        <description><![CDATA[{{ $data->first()->description }}]]></description>
        <language>ar</language>
        <pubDate>{{ now() }}</pubDate>
        @foreach ($data as $item)
            <item>
                <title><![CDATA[{{ $item->title }}]]></title>
                <link><![CDATA[{{ $item->id }}]]></link>
                <description><![CDATA[{{ $item->short_description }}]]></description>
                <author><![CDATA[Qusay Alkahlout]]></author>
                <guid>{{ $item->id }}</guid>
                <pubDate>{{ $item->created_at->toRssString() }}</pubDate>
                <enclosure url="{{ asset("storage/$item->basicFile") }}" type="image" length="3072" />
            </item>
        @endforeach
    </channel>
</rss>

