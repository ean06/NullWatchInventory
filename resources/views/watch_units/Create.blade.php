<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Add New Watch Unit
        </h2>
    </x-slot>

    <style>
        .nw-section { padding: 2.5rem 1rem; }
        .nw-form-card { max-width: 660px; margin: 0 auto; }
        .nw-card-header { text-align: center; padding: 1.75rem 2rem 0; }
        .nw-ornament { display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 1rem; opacity: 0.4; }
        .nw-ornament-line { width: 40px; height: 1px; background: var(--gold, #C9A84C); }
        .nw-ornament-diamond { width: 5px; height: 5px; background: var(--gold, #C9A84C); transform: rotate(45deg); }
        .nw-card-title { font-family: 'DM Sans', sans-serif; font-size: 0.62rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--gold, #C9A84C); display: block; margin-bottom: 0.3rem; }
        .nw-card-heading { font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 400; color: var(--nw-text-primary, #1A1008); margin-bottom: 1.5rem; }

        .nw-form-body { padding: 1.5rem 2rem 2rem; }

        .nw-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 0 1.25rem; }
        .nw-grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 0 1.25rem; }
        .nw-field { margin-bottom: 1.5rem; }
        .nw-field-full { grid-column: 1 / -1; }

        .nw-label { display: block; font-family: 'DM Sans', sans-serif; font-size: 0.65rem; font-weight: 500; letter-spacing: 0.2em; text-transform: uppercase; color: var(--nw-text-secondary, #6B4F35); margin-bottom: 0.45rem; }

        .nw-input, .nw-textarea, .nw-select {
            width: 100%;
            background: rgba(255, 252, 245, 0.75);
            border: 1px solid rgba(139, 111, 71, 0.35);
            border-radius: 0;
            padding: 0.7rem 0.9rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.875rem;
            color: var(--nw-text-primary, #1A1008);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            appearance: none;
            -webkit-appearance: none;
        }
        .nw-input:focus, .nw-textarea:focus, .nw-select:focus {
            border-color: var(--gold, #C9A84C);
            background: rgba(255, 252, 248, 0.95);
            box-shadow: 0 0 0 2px rgba(201, 168, 76, 0.12);
        }
        .nw-textarea { resize: vertical; min-height: 80px; }
        .nw-select-wrap { position: relative; }
        .nw-select-wrap::after { content: '▾'; position: absolute; right: 0.9rem; top: 50%; transform: translateY(-50%); color: var(--sepia, #8B6F47); font-size: 0.7rem; pointer-events: none; }

        .nw-error { font-family: 'DM Sans', sans-serif; font-size: 0.72rem; color: #8B2020; margin-top: 0.35rem; }
        .nw-divider { height: 1px; background: rgba(201, 168, 76, 0.2); margin: 1.5rem 0; }

        .nw-section-label { font-family: 'DM Sans', sans-serif; font-size: 0.6rem; letter-spacing: 0.25em; text-transform: uppercase; color: var(--sepia, #8B6F47); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.75rem; }
        .nw-section-label::after { content: ''; flex: 1; height: 1px; background: rgba(201,168,76,0.2); }

        .nw-input-prefix-wrap { position: relative; }
        .nw-input-prefix { position: absolute; left: 0.9rem; top: 50%; transform: translateY(-50%); font-family: 'DM Sans', sans-serif; font-size: 0.75rem; color: var(--sepia, #8B6F47); pointer-events: none; }
        .nw-input-prefix-wrap .nw-input { padding-left: 2.5rem; }

        .nw-form-actions { display: flex; align-items: center; justify-content: space-between; gap: 1rem; }
        .nw-btn-back { font-family: 'Cormorant Garamond', serif; font-style: italic; font-size: 0.88rem; color: var(--nw-text-secondary, #6B4F35); text-decoration: none; transition: color 0.2s; }
        .nw-btn-back:hover { color: var(--dark-brown, #2C1810); text-decoration: underline; text-underline-offset: 3px; }
        .nw-btn-back::before { content: '← '; }
        .nw-btn-submit { font-family: 'DM Sans', sans-serif; font-size: 0.72rem; font-weight: 500; letter-spacing: 0.18em; text-transform: uppercase; padding: 0.8rem 2rem; background: var(--dark-brown, #2C1810); color: var(--gold-light, #E8C97A); border: 1px solid var(--dark-brown, #2C1810); border-radius: 0; cursor: pointer; transition: background 0.2s; position: relative; }
        .nw-btn-submit::after { content: ''; position: absolute; inset: 3px; border: 1px solid rgba(201,168,76,0.3); pointer-events: none; }
        .nw-btn-submit:hover { background: var(--medium-brown, #5C3D2E); }
    </style>

    <div class="nw-section">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="nw-form-card">
                <div class="overflow-hidden bg-white">

                    <div class="nw-card-header">
                        <div class="nw-ornament">
                            <div class="nw-ornament-line"></div>
                            <div class="nw-ornament-diamond"></div>
                            <div class="nw-ornament-line"></div>
                        </div>
                        <span class="nw-card-title">Watch Unit Management</span>
                        <h2 class="nw-card-heading">Add New Watch Unit</h2>
                    </div>

                    <div class="nw-form-body">
                        <form method="POST" action="/watch-units/create">
                            @csrf

                            {{-- Identity --}}
                            <div class="nw-section-label">Identity</div>
                            <div class="nw-grid-2">

                                <div class="nw-field nw-field-full">
                                    <label for="modelId" class="nw-label">Watch Model <span style="color:#8B2020">*</span></label>
                                    <div class="nw-select-wrap">
                                        <select id="modelId" name="modelId" class="nw-select" required>
                                            <option value="" disabled selected>— Select a model —</option>
                                            @foreach($watchModels as $model)
                                                <option value="{{ $model->modelId }}" {{ old('modelId') == $model->modelId ? 'selected' : '' }}>
                                                    {{ $model->brand->name ?? '?' }} — {{ $model->model_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('modelId') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field">
                                    <label for="sku" class="nw-label">SKU</label>
                                    <input type="text" id="sku" name="sku" class="nw-input"
                                        value="{{ old('sku') }}"
                                        placeholder="e.g. WU-001">
                                    @error('sku') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field">
                                    <label for="condition" class="nw-label">Condition</label>
                                    <div class="nw-select-wrap">
                                        <select id="condition" name="condition" class="nw-select">
                                            <option value="">— None —</option>
                                            <option value="excellent" {{ old('condition') === 'excellent' ? 'selected' : '' }}>Excellent</option>
                                            <option value="good"      {{ old('condition') === 'good'      ? 'selected' : '' }}>Good</option>
                                            <option value="fair"      {{ old('condition') === 'fair'      ? 'selected' : '' }}>Fair</option>
                                            <option value="poor"      {{ old('condition') === 'poor'      ? 'selected' : '' }}>Poor</option>
                                            <option value="minus"     {{ old('condition') === 'minus'     ? 'selected' : '' }}>Minus</option>
                                        </select>
                                    </div>
                                    @error('condition') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field nw-field-full">
                                    <label for="status" class="nw-label">Status</label>
                                    <div class="nw-select-wrap">
                                        <select id="status" name="status" class="nw-select">
                                            <option value="">— None —</option>
                                            <option value="availabel"  {{ old('status') === 'availabel'  ? 'selected' : '' }}>Available</option>
                                            <option value="reserved"   {{ old('status') === 'reserved'   ? 'selected' : '' }}>Reserved</option>
                                            <option value="sold"       {{ old('status') === 'sold'       ? 'selected' : '' }}>Sold</option>
                                            <option value="inServices" {{ old('status') === 'inServices' ? 'selected' : '' }}>In Service</option>
                                        </select>
                                    </div>
                                    @error('status') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                            </div>

                            <div class="nw-divider"></div>

                            {{-- Pricing --}}
                            <div class="nw-section-label">Pricing</div>
                            <div class="nw-grid-3">

                                <div class="nw-field">
                                    <label for="purchase_price" class="nw-label">Purchase Price</label>
                                    <div class="nw-input-prefix-wrap">
                                        <span class="nw-input-prefix">Rp</span>
                                        <input type="number" id="purchase_price" name="purchase_price" class="nw-input"
                                            value="{{ old('purchase_price') }}" min="0" placeholder="0">
                                    </div>
                                    @error('purchase_price') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field">
                                    <label for="asking_price" class="nw-label">Asking Price</label>
                                    <div class="nw-input-prefix-wrap">
                                        <span class="nw-input-prefix">Rp</span>
                                        <input type="number" id="asking_price" name="asking_price" class="nw-input"
                                            value="{{ old('asking_price') }}" min="0" placeholder="0">
                                    </div>
                                    @error('asking_price') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field">
                                    <label for="sold_price" class="nw-label">Sold Price</label>
                                    <div class="nw-input-prefix-wrap">
                                        <span class="nw-input-prefix">Rp</span>
                                        <input type="number" id="sold_price" name="sold_price" class="nw-input"
                                            value="{{ old('sold_price') }}" min="0" placeholder="0">
                                    </div>
                                    @error('sold_price') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                            </div>

                            <div class="nw-divider"></div>

                            {{-- Dates & Notes --}}
                            <div class="nw-section-label">Dates & Notes</div>
                            <div class="nw-grid-2">

                                <div class="nw-field">
                                    <label for="purchase_date" class="nw-label">Purchase Date</label>
                                    <input type="date" id="purchase_date" name="purchase_date" class="nw-input"
                                        value="{{ old('purchase_date') }}">
                                    @error('purchase_date') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field">
                                    <label for="sold_date" class="nw-label">Sold Date</label>
                                    <input type="date" id="sold_date" name="sold_date" class="nw-input"
                                        value="{{ old('sold_date') }}">
                                    @error('sold_date') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field nw-field-full">
                                    <label for="held" class="nw-label">Held By</label>
                                    <input type="text" id="held" name="held" class="nw-input"
                                        value="{{ old('held') }}"
                                        placeholder="Name or party holding this unit">
                                    @error('held') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field nw-field-full">
                                    <label for="note" class="nw-label">Note</label>
                                    <textarea id="note" name="note" class="nw-textarea"
                                        placeholder="Any additional notes..." maxlength="255">{{ old('note') }}</textarea>
                                    @error('note') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                            </div>

                            <div class="nw-divider"></div>

                            <div class="nw-form-actions">
                                <a href="/watch-units" class="nw-btn-back">Back to list</a>
                                <button type="submit" class="nw-btn-submit">Save Unit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
