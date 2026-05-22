<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Watch Unit Management
        </h2>
    </x-slot>

    <style>
        .nw-section { padding: 2.5rem 1rem; }

        .nw-alert {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 0.9rem;
            color: var(--medium-brown, #5C3D2E);
            background: rgba(201, 168, 76, 0.12);
            border: 1px solid rgba(201, 168, 76, 0.35);
            padding: 0.75rem 1.25rem;
            margin-bottom: 1.5rem;
        }

        .nw-topbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; }

        .nw-page-title { font-family: 'Playfair Display', serif; font-size: 1.1rem; font-weight: 400; color: var(--nw-text-primary, #1A1008); letter-spacing: 0.02em; }
        .nw-page-title span { font-family: 'DM Sans', sans-serif; font-size: 0.72rem; color: var(--sepia, #8B6F47); letter-spacing: 0.1em; display: block; text-transform: uppercase; margin-bottom: 0.2rem; }

        .nw-btn-add { font-family: 'DM Sans', sans-serif; font-size: 0.7rem; font-weight: 500; letter-spacing: 0.18em; text-transform: uppercase; text-decoration: none; padding: 0.65rem 1.5rem; background: var(--dark-brown, #2C1810); color: var(--gold-light, #E8C97A); border: 1px solid var(--dark-brown, #2C1810); display: inline-block; transition: background 0.2s; position: relative; }
        .nw-btn-add::after { content: ''; position: absolute; inset: 3px; border: 1px solid rgba(201,168,76,0.3); pointer-events: none; }
        .nw-btn-add:hover { background: var(--medium-brown, #5C3D2E); }

        .nw-table-wrap { overflow-x: auto; }

        .nw-table { width: 100%; border-collapse: collapse; font-family: 'DM Sans', sans-serif; font-size: 0.85rem; }
        .nw-table thead tr { border-bottom: 1px solid rgba(201, 168, 76, 0.35); }
        .nw-table th { font-size: 0.62rem !important; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: var(--sepia, #8B6F47) !important; padding: 0.75rem 1rem; text-align: left; background: transparent !important; }
        .nw-table td { padding: 0.85rem 1rem; color: var(--nw-text-primary, #1A1008) !important; border-bottom: 1px solid rgba(201, 168, 76, 0.1) !important; vertical-align: middle; }
        .nw-table tbody tr:hover td { background-color: rgba(201, 168, 76, 0.05) !important; }

        .nw-empty { text-align: center; padding: 3rem 1rem; font-family: 'Cormorant Garamond', serif; font-style: italic; font-size: 1rem; color: var(--sepia, #8B6F47); opacity: 0.6; }

        .nw-actions { display: flex; gap: 0.5rem; align-items: center; }

        .nw-btn-sm { font-family: 'DM Sans', sans-serif; font-size: 0.65rem; font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; padding: 0.4rem 0.9rem; border: 1px solid; display: inline-block; cursor: pointer; transition: all 0.2s; background: transparent; }
        .nw-btn-detail { color: var(--medium-brown, #5C3D2E); border-color: rgba(139, 111, 71, 0.4); }
        .nw-btn-detail:hover { background: rgba(139, 111, 71, 0.08); border-color: var(--medium-brown, #5C3D2E); }
        .nw-btn-edit { color: var(--dark-brown, #2C1810); border-color: rgba(201, 168, 76, 0.5); }
        .nw-btn-edit:hover { background: rgba(201, 168, 76, 0.1); border-color: var(--gold, #C9A84C); }
        .nw-btn-delete { color: #8B2020; border-color: rgba(139, 32, 32, 0.35); }
        .nw-btn-delete:hover { background: rgba(139, 32, 32, 0.06); border-color: #8B2020; }

        .nw-id-badge { font-size: 0.7rem; color: var(--sepia, #8B6F47); font-family: 'Cormorant Garamond', serif; font-style: italic; }

        /* Status badges */
        .nw-badge {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.6rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.2rem 0.6rem;
            border: 1px solid;
            display: inline-block;
            white-space: nowrap;
        }
        .nw-badge-available  { color: #2D6A4F; border-color: rgba(45,106,79,0.4);  background: rgba(45,106,79,0.06); }
        .nw-badge-reserved   { color: #785E26; border-color: rgba(201,168,76,0.5); background: rgba(201,168,76,0.08); }
        .nw-badge-sold       { color: #5C3D2E; border-color: rgba(92,61,46,0.4);   background: rgba(92,61,46,0.06); }
        .nw-badge-inservices { color: #1D4E89; border-color: rgba(29,78,137,0.35); background: rgba(29,78,137,0.06); }

        .nw-condition-dot {
            display: inline-block;
            width: 7px; height: 7px;
            border-radius: 50%;
            margin-right: 5px;
            vertical-align: middle;
        }
        .dot-excellent { background: #2D6A4F; }
        .dot-good      { background: #C9A84C; }
        .dot-fair      { background: #B07D3A; }
        .dot-poor      { background: #8B2020; }
        .dot-minus     { background: #555; }

        .nw-price { font-variant-numeric: tabular-nums; white-space: nowrap; }

        .nw-ornament-row { display: flex; align-items: center; gap: 10px; margin-bottom: 1.5rem; opacity: 0.35; }
        .nw-ornament-line { flex: 1; height: 1px; background: var(--gold, #C9A84C); }
        .nw-ornament-diamond { width: 5px; height: 5px; background: var(--gold, #C9A84C); transform: rotate(45deg); flex-shrink: 0; }
    </style>

    <div class="nw-section">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="nw-alert">{{ session('success') }}</div>
            @endif

            <div class="nw-topbar">
                <div class="nw-page-title">
                    <span>Inventory</span>
                    Watch Unit List
                </div>
                <a href="/watch-units/create" class="nw-btn-add">+ Add Unit</a>
            </div>

            <div class="nw-ornament-row">
                <div class="nw-ornament-line"></div>
                <div class="nw-ornament-diamond"></div>
                <div class="nw-ornament-line"></div>
            </div>

            <div class="overflow-hidden bg-white">
                <div class="nw-table-wrap">
                    <table class="nw-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Model</th>
                                <th>Condition</th>
                                <th>Status</th>
                                <th>Purchase Price</th>
                                <th>Asking Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($watchUnits as $unit)
                                <tr>
                                    <td><span class="nw-id-badge">{{ $unit->unitId }}</span></td>
                                    <td><span class="nw-id-badge">{{ $unit->sku ?? '—' }}</span></td>
                                    <td>
                                        <strong>{{ $unit->watchModel->model_name ?? '—' }}</strong>
                                        @if($unit->watchModel?->brand)
                                            <br><span style="font-size:0.75rem;color:var(--sepia,#8B6F47)">{{ $unit->watchModel->brand->name }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($unit->condition)
                                            <span class="nw-condition-dot dot-{{ $unit->condition }}"></span>{{ ucfirst($unit->condition) }}
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = match($unit->status) {
                                                'availabel'  => 'nw-badge-available',
                                                'reserved'   => 'nw-badge-reserved',
                                                'sold'       => 'nw-badge-sold',
                                                'inServices' => 'nw-badge-inservices',
                                                default      => '',
                                            };
                                            $statusLabel = match($unit->status) {
                                                'availabel'  => 'Available',
                                                'inServices' => 'In Service',
                                                default      => ucfirst($unit->status ?? '—'),
                                            };
                                        @endphp
                                        @if($unit->status)
                                            <span class="nw-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td class="nw-price">
                                        {{ $unit->purchase_price !== null ? 'Rp ' . number_format($unit->purchase_price, 0, ',', '.') : '—' }}
                                    </td>
                                    <td class="nw-price">
                                        {{ $unit->asking_price !== null ? 'Rp ' . number_format($unit->asking_price, 0, ',', '.') : '—' }}
                                    </td>
                                    <td>
                                        <div class="nw-actions">
                                            <a href="/watch-units/show/{{ $unit->unitId }}" class="nw-btn-sm nw-btn-detail">Detail</a>
                                            <a href="/watch-units/edit/{{ $unit->unitId }}" class="nw-btn-sm nw-btn-edit">Edit</a>
                                            <form method="POST" action="/watch-units/delete/{{ $unit->unitId }}" onsubmit="return confirm('Hapus unit {{ $unit->sku ?? $unit->unitId }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="nw-btn-sm nw-btn-delete">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <div class="nw-empty">No watch units found — add your first unit above.</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
