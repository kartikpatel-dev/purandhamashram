@if ($users->count() > 0)
    <ul class="rp_list">
        @forelse($users as $user)
            @if (!empty($user->full_name))
                <li>{{ $user->full_name }}</li>
            @endif
        @empty
        @endforelse
    </ul>
@endif
