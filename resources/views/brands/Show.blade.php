<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Brand Detail
        </h2>
    </x-slot>

    <style>
        .nw-section { padding: 2.5rem 1rem; }

        .nw-detail-card { max-width: 560px; margin: 0 auto; }

        .nw-card-header { text-align: center; padding: 1.75rem 2rem 1.25rem; }

        .nw-ornament { display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 1rem; opacity: 0.4; }
        .nw-ornament-line { width: 40px; height: 1px; background: var(--gold, #C9A84C); }
        .nw-ornament-diamond { width: 5px; height: 5px; background: var(--gold, #C9A84C); transform: rotate(45deg); }

        .nw-card-title { font-family: 'DM Sans', sans-serif; font-size: 0.62rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--gold, #C9A84C); display: block; margin-bottom: 0.3rem; }
        .nw-brand-name-display { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 400; color: var(--nw-text-primary, #1A1008); margin-bottom: 0.4rem; }
        .nw-card-id { font-family: 'Cormorant Garamond', serif; font-style: italic; font-size: 0.85rem; color: var(--sepia, #8B6F47); display: block; }

        /* Detail rows */
        .nw-detail-body { padding: 0 2rem 2rem; }

        .nw-divider { height: 1px; background: rgba(201, 168, 76, 0.2); margin: 1.25rem 0; }

        .nw-detail-row { display: flex; gap: 1rem; padding: 0.85rem 0; border-bottom: 1px solid rgba(201, 168, 76, 0.1); }
        .nw-detail-row:last-of-type { border-bottom: none; }

        .nw-detail-key { font-family: 'DM Sans', sans-serif; font-size: 0.62rem; font-weight: 500; letter-spacing: 0.18em; text-transform: uppercase; color: var(--sepia, #8B6F47); width: 110px; flex-shrink: 0; padding-top: 0.1rem; }
        .nw-detail-val { font-family: 'DM Sans', sans-serif; font-size: 0.875rem; color: var(--nw-text-primary, #1A1008); flex: 1; }
        .nw-detail-val.empty { font-family: 'Cormorant Garamond', serif; font-style: italic; color: var(--sepia, #8B6F47); opacity: 0.6; }

        /* Actions */
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
                        <span class="nw-card-title">Brand Detail</span>
                        <h2 class="nw-brand-name-display">{{ $brand->name }}</h2>
                        <span class="nw-card-id">ID #{{ $brand->brandId }}</span>
                    </div>

                    <div class="nw-detail-body">
                        <div class="nw-divider"></div>

                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Brand ID</span>
                            <span class="nw-detail-val">{{ $brand->brandId }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Name</span>
                            <span class="nw-detail-val">{{ $brand->name }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Description</span>
                            <span class="nw-detail-val {{ $brand->desc ? '' : 'empty' }}">
                                {{ $brand->desc ?? 'No description provided.' }}
                            </span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Created</span>
                            <span class="nw-detail-val">{{ $brand->created_at?->format('d M Y, H:i') ?? '—' }}</span>
                        </div>
                        <div class="nw-detail-row">
                            <span class="nw-detail-key">Updated</span>
                            <span class="nw-detail-val">{{ $brand->updated_at?->format('d M Y, H:i') ?? '—' }}</span>
                        </div>

                        <div class="nw-divider"></div>

                        <div class="nw-detail-actions">
                            <a href="/brands" class="nw-btn-back">Back to list</a>
                            <div class="nw-actions-right">
                                <a href="/brands/edit/{{ $brand->brandId }}" class="nw-btn-sm nw-btn-edit">Edit</a>
                                <form method="POST" action="/brands/delete/{{ $brand->brandId }}" onsubmit="return confirm('Hapus brand {{ $brand->name }}?')">
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
