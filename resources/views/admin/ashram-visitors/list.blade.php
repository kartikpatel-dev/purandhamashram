<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
        <th width="15%">Name</th>
        <th width="25%">Email Address</th>
        <th width="15%">Check In Date</th>
        <th width="15%">Check Out Date</th>
        <th width="15%">Check In/Out Status</th>
        <th width="15%">Number Of Person</th>
    </thead>
    <tbody>
        @forelse($RS_Results as $RS_Row)
            <tr class="delete-{{ $RS_Row->id }}">
                <td>{{ $RS_Row->visitedUser->first_name }} {{ $RS_Row->visitedUser->last_name }}</td>
                <td>{{ $RS_Row->visitedUser->email }}</td>
                <td>
                    {{ \Carbon\Carbon::parse($RS_Row->checkin_date)->format('d-m-Y') }}
                    {{ \Carbon\Carbon::parse($RS_Row->checkin_time)->format('h:i A') }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($RS_Row->checkout_date)->format('d-m-Y') }}
                    {{ \Carbon\Carbon::parse($RS_Row->checkout_time)->format('h:i A') }}
                </td>
                <td>{{ $RS_Row->visitedUser->visitor_status == 1 ? 'Check In' : 'Check Out' }}</td>
                <td>{{ $RS_Row->number_of_person }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No data found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{!! $RS_Results->links('pagination::bootstrap-5') !!}
