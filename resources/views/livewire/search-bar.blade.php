<div style="position: relative;">
    <input id="searchInput" type="text" wire:model.debounce.300ms="query" placeholder="Search..." class="form-control">
    <div class="list-group" style="position: absolute; top: 100%; left: 0; right: 0; z-index: 1; {{ empty($query) ? 'display:none;' : '' }}">
        @foreach ($searchResults as $result)
            @if ($result['type'] == 'lead')
                @can('lead.listing')
                    @if (Auth::user()->name == $result['user_name'])
                        <a href="#" wire:click.prevent="edit('{{ $result['type'] }}', {{ $result['id'] }})"
                            class="list-group-item list-group-item-action">
                            <b>Unique ID:</b> <span style="color: red">{{ $result['unique_id'] }}</span>
                            <b>Name:</b> {{ $result['f_name'] }} {{ $result['m_name'] }} {{ $result['l_name'] }}
                            <b>Phone:</b> {{ $result['phone'] }} {{ $result['alt_phone'] }}
                            <b>Agent Name:</b> {{ $result['user_name'] }}
                        </a>
                    @else
                        <div class="list-group-item list-group-item-action">
                            <b>Unique ID:</b> <span style="color: red">{{ $result['unique_id'] }}</span>
                            <b>Name:</b> {{ $result['f_name'] }} {{ $result['m_name'] }} {{ $result['l_name'] }}
                            <b>Phone:</b> {{ $result['phone'] }} {{ $result['alt_phone'] }}
                            <b>Agent Name:</b> {{ $result['user_name'] }}
                        </div>
                    @endif
                @endcan
            @elseif($result['type'] == 'sale')
                @can('sale.listing')
                    @if (Auth::user()->name == $result['user_name'])
                        <a href="#" wire:click.prevent="edit('{{ $result['type'] }}', {{ $result['id'] }})"
                            class="list-group-item list-group-item-action">
                            <b>Unique ID:</b> <span style="color: red">{{ $result['unique_id'] }}</span style="color: red">
                            <b>Name:</b> {{ $result['f_name'] }} {{ $result['m_name'] }} {{ $result['l_name'] }}
                            <b>Phone:</b> {{ $result['phone'] }} {{ $result['alt_phone'] }}
                            <b>Agent Name:</b> {{ $result['user_name'] }}
                        </a>
                    @else
                        <div class="list-group-item list-group-item-action">
                            <b>Unique ID:</b> <span style="color: red">{{ $result['unique_id'] }}</span>
                            <b>Name:</b> {{ $result['f_name'] }} {{ $result['m_name'] }} {{ $result['l_name'] }}
                            <b>Phone:</b> {{ $result['phone'] }} {{ $result['alt_phone'] }}
                            <b>Agent Name:</b> {{ $result['user_name'] }}
                        </div>
                    @endif
                @endcan
            @endif
        @endforeach
    </div>
</div>

<script>
    // JavaScript to set the focus on the search input element
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.focus();
        }
    });
</script>
