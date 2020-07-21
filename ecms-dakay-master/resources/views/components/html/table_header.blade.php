<thead>
        <tr>
            @foreach($headers as $header)
                <th class="table-header">{{ ucwords($header) }}</th>
            @endforeach
        </tr>
</thead>