<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Watch Unit Detail
        </h2>
    </x-slot>

    <style>
        .nw-section { padding: 2.5rem 1rem; }
        .nw-detail-card { max-width: 600px; margin: 0 auto; }
        .nw-card-header { text-align: center; padding: 1.75rem 2rem 1.25rem; }
        .nw-ornament { display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 1rem; opacity: 0.4; }
        .nw-ornament-line { width: 40px; height: 1px; background: var(--gold, #C9A84C); }
        .nw-ornament-diamond { width: 5px; height: 5px; background: var(--gold, #C9A84C); transform: rotate(45deg); }
        .nw-card-title { font-family: 'DM Sans', sans-serif; font-size: 0.62rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--gold, #C9A84C); display: block; margin-bottom: 0.3rem; }
        .nw-unit-sku-display { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 400; color: var(--nw-text-primary, #1A1008); margin-bottom: 0.2rem; }
        .nw-model-sub { font-family: 'Cormorant Garamond', serif; font-style: italic; font-size: 1rem; color: var(--sepia, #8B6F47); display: block; margin-bottom: 0.25rem; }
        .nw-card-id { font-family: 'Cormorant Garamond', serif; font-style: italic; font-size: 0.8rem; color: var(--sepia, #8B6F47); opacity: 0.7; display: block; }

        .nw-detail-body { padding: 0 2rem 2rem; }
        .nw-divider { height: 1px; background: rgba(201, 168, 76, 0.2); margin: 1.25rem 0; }

        .nw-section-label { font-family: 'DM Sans', sans-serif; font-size: 0.6rem; letter-spacing: 0.25em; text-transform: uppercase; color: var(--sepia, #8B6F47); margin: 1rem 0 0.5rem; display: flex; align-items: center; gap: 0.75rem; }
        .nw-section-label::after { content: ''; flex: 1; height: 1px; background: rgba(201,168,76,0.2); }

        .nw-detail-row { display: flex; gap: 1rem; padding: 0.85rem 0; border-bottom: 1px solid rgba(201, 168, 76, 0.1); }
        .nw-detail-row:last-of-type { border-bottom: none; }
        .nw-detail-key { font-family: 'DM Sans', sans-serif; font-size: 0.62rem; font-weight: 500; letter-spacing: 0.18em; text-transform: uppercase; color: var(--sepia, #8B6F47); width: 130px; flex-shrink: 0; padding-top: 0.1rem; }
        .nw-detail-val { font-family: 'DM Sans', sans-serif; font-size: 0.875rem; color: var(--nw-text-primary, #1A1008); flex: 1; }
        .nw-detail-val.empty { font-family: 'Cormorant Garamond', serif; font-style: italic; color: var(--sepia, #8B6F47); opacity: 0.6; }

        .nw-price-large { font-family: 'DM Sans', sans-serif; font-size: 0.875rem; font-variant-numeric: tabular-nums; }

        /* Status badges */
        .nw-badge { font-family: 'DM Sans', sans-serif; font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.2rem 0.6rem; border: 1px solid; display: inline-block; white-space: nowrap; }
        .nw-badge-available  { color: #2D6A4F; border-color: rgba(45,106,79,0.4);  background: rgba(45,106,79,0.06); }
        .nw-badge-reserved   { color: #785E26; border-color: rgba(201,168,76,0.5); background: rgba(201,168,76,0.08); }
        .nw-badge-sold       { color: #5C3D2E; border-color: rgba(92,61,46,0.4);   background: rgba(92,61,46,0.06); }
        .nw-badge-inservices { color: #1D4E89; border-color: rgba(29,78,137,0.35); background: rgba(29,78,137,0.06); }

        .nw-condition-dot { display: inline-block; width: 7px; height: 7px; border-radius: 50%; margin-right: 5px; vertical-align: middle; }
        .dot-excellent { background: #2D6A4F; }
        .dot-good      { background: #C9A84C; }
        .dot-fair      { background: #B07D3A; }
        .dot-poor      { background: #8B2020; }
        .dot-minus     { background: #555; }

        /* P&L summary strip */
        .nw-pnl-strip {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1px;
            background: rgba(201,168,76,0.2);
            border: 1px solid rgba(201,168,76,0.2);
            margin-bottom: 1.5rem;
        }
        .nw-pnl-cell {
            background: #fff;
            padding: 0.9rem 1rem;
            text-align: center;
        }
        .nw-pnl-label { font-family: 'DM Sans', sans-serif; font-size: 0.58rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--sepia, #8B6F47); display: block; margin-bottom: 0.3rem; }
        .nw-pnl-value { font-family: 'DM Sans', sans-serif; font-size: 0.85rem; font-variant-numeric: tabular-nums; color: var(--nw-text-primary, #1A1008); font-weight: 500; }
        .nw-pnl-value.profit { color: #2D6A4F; }
        .nw-pnl-value.loss   { color: #8B2020; }

        .nw-detail-actions { display: flex; align-items: center; justify-content: space-between; gap: 1rem; padding-top: 1.5rem; }
        .nw-btn-back { font-family: 'Cormorant Garamond', serif; font-style: italic; font-size: 0.88rem; color: var(--nw-text-secondary, #6B4F35); text-decoration: none; transition: color 0.2s; }
        .nw-btn-back:hover { color: var(--dark-brown, #2C1810); text-decoration: underline; text-underline-offset: 3px; }
        .nw-btn-back::before { content: '← '; }
        .nw-actions-right { display: flex; gap: 0.5rem; }
        .nw-btn-sm { font-family: 'DM Sans', sans-serif; font-size: 0.65rem; font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; padding: 0.55rem 1.1rem; border: 1px solid; display: inline-block; cursor: pointer; transition: all 0.2s; background: transparent; border-radius: 0; }
        .nw-btn-edit { color: var(--dark-brown, #2C1810); border-color: rgba(201, 168, 76, 0.5); }
        .nw-btn-edit:hover { background: rgba(201, 168, 76, 0.1); border-color: var(--gold, #C9A84C); }
        .nw-btn-delete { color: #8B2020; border-color: rgba(139, 32, 32, 0.35); }
        .nw-btn-delete:hover { background: rgba(139, 32, 32, 0.06); border-color: #8B2020; }
    </style>

    <div class="nw-section">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="nw-detail-card">
                <div class="overflow-hidden bg-white">

                    <div class="nw-card-header">
                        <div class="nw-ornament">
                            <div class="nw-ornament-line"></div>
                            <div class="nw-ornament-diamond"></div>
                            <div class="nw-ornament-line"></div>
                        </div>
                        <span class="nw-card-title">Watch Unit Detail</span>
                        <h2 class="nw-unit-sku-display">{{ $watchUnit->sku ?? 'No SKU' }}</h2>
                        <span class="nw-model-sub">
                            {{ $watchUnit->watchModel->brand->name ?? '—' }} — {{ $watchUnit->watchModel->model_name ?? '—' }}
                        </span>
                        <span class="nw-card-id">Unit ID #{{ $watchUnit->unitId }}</span>
                    </div>

                    <div class="nw-detail-body">

                        {{-- P&L strip --}}
                        @php
                            $purchase = $watchUnit->purchase_price;
                            $sold     = $watchUnit->sold_price;
                            $pnl      = ($purchase !== null && $sold !== null) ? ($sold - $purchase) : null;
                        @endphp
                        <div class="nw-pnl-strip">
                            <div class="nw-pnl-cell">
                                <span class="nw-pnl-label">Purchase</span>
                                <span class="nw-pnl-value">{{ $purchase !== null ? 'Rp ' . number_format($purchase, 0, ',', '.') : '—' }}</span>
                            </div>
                            <div class="nw-pnl-cell">
                                <span class="nw-pnl-label">Asking</span>
                                <span class="nw-pnl-value">{{ $watchUnit->asking_price !== null ? 'Rp ' . number_format($watchUnit->asking_price, 0, ',', '.') : '—' }}</span>
                            </div>
                            <div class="nw-pnl-cell">
                                <span class="nw-pnl-label">{{ $sold !== null ? 'Sold' : 'P&L' }}</span>
                                @if($pnl !== null)
                                    <span class="nw-pnl-value {{ $pnl >= 0 ? 'profit' : 'loss' }}">
                                        {{ ($pnl >= 0 ? '+' : '') . 'Rp ' . number_format($pnl, 0, ',', '.') }}
                                    </span>
                                @elseif($sold !== null)
                                    <span class="nw-pnl-value">Rp {{ number_format($sold, 0, ',', '.') }}</span>
                                @else
                                    <span class="nw-pnl-value" style="opacity:0.4">—</span>
                                @endif
                            </div>
                        </div>

                        <div class="nw-divider"></div>

                        <div class="nw-section-label">Identity</div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Unit ID</span>
                            <span class="nw-detail-val">{{ $watchUnit->unitId }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">SKU</span>
                            <span class="nw-detail-val {{ $watchUnit->sku ? '' : 'empty' }}">{{ $watchUnit->sku ?? 'Not specified.' }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Model</span>
                            <span class="nw-detail-val">{{ $watchUnit->watchModel->model_name ?? '—' }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Brand</span>
                            <span class="nw-detail-val">{{ $watchUnit->watchModel->brand->name ?? '—' }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Condition</span>
                            <span class="nw-detail-val">
                                @if($watchUnit->condition)
                                    <span class="nw-condition-dot dot-{{ $watchUnit->condition }}"></span>{{ ucfirst($watchUnit->condition) }}
                                @else
                                    <span class="empty" style="font-family:'Cormorant Garamond',serif;font-style:italic;opacity:0.6">Not specified.</span>
                                @endif
                            </span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Status</span>
                            <span class="nw-detail-val">
                                @php
                                    $statusClass = match($watchUnit->status) {
                                        'availabel'  => 'nw-badge-available',
                                        'reserved'   => 'nw-badge-reserved',
                                        'sold'       => 'nw-badge-sold',
                                        'inServices' => 'nw-badge-inservices',
                                        default      => '',
                                    };
                                    $statusLabel = match($watchUnit->status) {
                                        'availabel'  => 'Available',
                                        'inServices' => 'In Service',
                                        default      => ucfirst($watchUnit->status ?? ''),
                                    };
                                @endphp
                                @if($watchUnit->status)
                                    <span class="nw-badge {{ $statusClass }}">{{ $statusLabel }}</span>
                                @else
                                    <span class="empty" style="font-family:'Cormorant Garamond',serif;font-style:italic;opacity:0.6">Not set.</span>
                                @endif
                            </span>
                        </div>

                        <div class="nw-section-label" style="margin-top:1.25rem">Dates</div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Purchase Date</span>
                            <span class="nw-detail-val {{ $watchUnit->purchase_date ? '' : 'empty' }}">
                                {{ $watchUnit->purchase_date ? \Carbon\Carbon::parse($watchUnit->purchase_date)->format('d M Y') : 'Not specified.' }}
                            </span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Sold Date</span>
                            <span class="nw-detail-val {{ $watchUnit->sold_date ? '' : 'empty' }}">
                                {{ $watchUnit->sold_date ? \Carbon\Carbon::parse($watchUnit->sold_date)->format('d M Y') : 'Not specified.' }}
                            </span>
                        </div>

                        <div class="nw-section-label" style="margin-top:1.25rem">Notes</div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Held By</span>
                            <span class="nw-detail-val {{ $watchUnit->held ? '' : 'empty' }}">{{ $watchUnit->held ?? 'Not specified.' }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Note</span>
                            <span class="nw-detail-val {{ $watchUnit->note ? '' : 'empty' }}">{{ $watchUnit->note ?? 'No notes.' }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Created</span>
                            <span class="nw-detail-val">{{ $watchUnit->created_at?->format('d M Y, H:i') ?? '—' }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Updated</span>
                            <span class="nw-detail-val">{{ $watchUnit->updated_at?->format('d M Y, H:i') ?? '—' }}</span>
                        </div>

                        <div class="nw-divider"></div>

                        <div class="nw-detail-actions">
                            <a href="/watch-units" class="nw-btn-back">Back to list</a>
                            <div class="nw-actions-right">
                                <a href="/watch-units/edit/{{ $watchUnit->unitId }}" class="nw-btn-sm nw-btn-edit">Edit</a>
                                <form method="POST" action="/watch-units/delete/{{ $watchUnit->unitId }}" onsubmit="return confirm('Hapus unit {{ $watchUnit->sku ?? $watchUnit->unitId }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="nw-btn-sm nw-btn-delete">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
