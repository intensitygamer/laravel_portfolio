Hi {{ $name }},

<p>
    Your profile was updated by someone else. Check the table below for the changes.
</p>

<table border="1">
    <tr>
        <th>Field</th>
        <th>Value</th>
    </tr>

    @foreach($fields as $field => $value)
        <tr>
            <td>{{ $field }}</td>
            <td>{{ $value }}</td>
        </tr>
    @endforeach
</table>

<br />

<p>
    thanks, dewaayam team
</p>