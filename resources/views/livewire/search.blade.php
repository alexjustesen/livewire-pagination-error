<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <input type="text" wire:model="search">

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            @foreach( $results as $result )
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $results->links() }}
</div>
