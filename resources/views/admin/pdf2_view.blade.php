<h1 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">Data Export</h1>
<div style="overflow-x: auto;">
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 0.5rem 1rem; border: 1px solid black;">Name</th>
                <th style="padding: 0.5rem 1rem; border: 1px solid black;">Email</th>
                <th style="padding: 0.5rem 1rem; border: 1px solid black;">Recipe Title</th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td style="padding: 0.5rem 1rem; border: 1px solid black;">{{ $item->name }}</td>
                    <td style="padding: 0.5rem 1rem; border: 1px solid black;">{{ $item->email }}</td>
                    <td style="padding: 0.5rem 1rem; border: 1px solid black;">{{ $item->title }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>