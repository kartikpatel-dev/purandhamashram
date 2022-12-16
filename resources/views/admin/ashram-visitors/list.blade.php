<table class="table table-hover table-striped table-bordered">
    <thead class="thead-dark">
        <th width="20%">Name</th>
        <th width="10%">City</th>
        <th width="10%">Country</th>
        <th width="15%">Check In Date</th>
        <th width="15%">Check Out Date</th>
        <th width="15%">Check In/Out Status</th>
        <th width="15%">Number Of Person</th>
    </thead>
    <tbody>
        @forelse($RS_Results as $RS_Row)
            <tr class="delete-{{ $RS_Row->id }}">
                <td>{{ $RS_Row->visitedUser->full_name }}</td>
                <td>{{ $RS_Row->visitedUser->city }}</td>
                <td>{{ $RS_Row->visitedUser->country }}</td>
                <td>
                    {{ $RS_Row->checkin_date }}
                    {{ \Carbon\Carbon::parse($RS_Row->checkin_time)->format('h:i A') }}
                </td>
                <td>
                    {{ $RS_Row->checkout_date }}
                    {{ \Carbon\Carbon::parse($RS_Row->checkout_time)->format('h:i A') }}
                </td>
                <td>
                    <center>
                        @if ($RS_Row->checkin_status == 1)
                            @if (\Carbon\Carbon::parse($RS_Row->checkin_date)->format('Y-m-d') > \Carbon\Carbon::now()->format('Y-m-d'))
                                {{ __('-') }}
                            @elseif (\Carbon\Carbon::parse($RS_Row->checkin_date)->format('Y-m-d') >= \Carbon\Carbon::now()->format('Y-m-d') ||
                                \Carbon\Carbon::parse($RS_Row->checkout_date)->format('Y-m-d') >= \Carbon\Carbon::now()->format('Y-m-d'))
                                <i class="fas fa-check text-success"></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        @else
                            <i class="fas fa-times text-danger"></i>
                        @endif
                    </center>
                </td>
                <td>
                    <center>{{ $RS_Row->number_of_person }}</center>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No data found.</td>
            </tr>
        @endforelse
    </tbody>
</table>

{!! $RS_Results->links('pagination::bootstrap-5') !!}
