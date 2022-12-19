<style type="text/css">
    h1,
    h2 {
        text-align: center;
    }

    table {
        width: 100%;
    }

    table td,
    table th {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 8px;
    }
</style>
<h1>{{ config('app.name', 'Laravel') }}</h1>
<h2>{{ __('Visitor History') }}</h2>
<table cellspacing="0">
    <thead class="thead-dark">
        <th>Name</th>
        <th>City</th>
        <th>Country</th>
        <th>Check In Date</th>
        <th>Check Out Date</th>
        <th>Check In/Out Status</th>
        <th>Number Of Person</th>
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
                                {{ __('Yes') }}
                            @else
                                {{ __('No') }}
                            @endif
                        @else
                            {{ __('No') }}
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
