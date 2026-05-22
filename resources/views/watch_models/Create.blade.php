<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Add New Watch Model
        </h2>
    </x-slot>

    <style>
        .nw-section { padding: 2.5rem 1rem; }

        .nw-form-card {
            max-width: 620px;
            margin: 0 auto;
        }

        .nw-card-header {
            text-align: center;
            padding: 1.75rem 2rem 0;
        }

        .nw-ornament { display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 1rem; opacity: 0.4; }
        .nw-ornament-line { width: 40px; height: 1px; background: var(--gold, #C9A84C); }
        .nw-ornament-diamond { width: 5px; height: 5px; background: var(--gold, #C9A84C); transform: rotate(45deg); }

        .nw-card-title { font-family: 'DM Sans', sans-serif; font-size: 0.62rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--gold, #C9A84C); display: block; margin-bottom: 0.3rem; }
        .nw-card-heading { font-family: 'Playfair Display', serif; font-size: 1.6rem; font-weight: 400; color: var(--nw-text-primary, #1A1008); margin-bottom: 1.5rem; }

        .nw-form-body { padding: 1.5rem 2rem 2rem; }

        .nw-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0 1.25rem;
        }

        .nw-field { margin-bottom: 1.5rem; }
        .nw-field-full { grid-column: 1 / -1; }

        .nw-label { display: block; font-family: 'DM Sans', sans-serif; font-size: 0.65rem; font-weight: 500; letter-spacing: 0.2em; text-transform: uppercase; color: var(--nw-text-secondary, #6B4F35); margin-bottom: 0.45rem; }

        .nw-input,
        .nw-textarea,
        .nw-select {
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

        .nw-input:focus,
        .nw-textarea:focus,
        .nw-select:focus {
            border-color: var(--gold, #C9A84C);
            background: rgba(255, 252, 248, 0.95);
            box-shadow: 0 0 0 2px rgba(201, 168, 76, 0.12);
        }

        .nw-textarea { resize: vertical; min-height: 90px; }

        .nw-select-wrap { position: relative; }
        .nw-select-wrap::after {
            content: '▾';
            position: absolute;
            right: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--sepia, #8B6F47);
            font-size: 0.7rem;
            pointer-events: none;
        }

        .nw-error { font-family: 'DM Sans', sans-serif; font-size: 0.72rem; color: #8B2020; margin-top: 0.35rem; }

        .nw-divider { height: 1px; background: rgba(201, 168, 76, 0.2); margin: 1.5rem 0; }

        .nw-section-label {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.6rem;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--sepia, #8B6F47);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .nw-section-label::after { content: ''; flex: 1; height: 1px; background: rgba(201,168,76,0.2); }

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
                        <span class="nw-card-title">Watch Model Management</span>
                        <h2 class="nw-card-heading">Add New Watch Model</h2>
                    </div>

                    <div class="nw-form-body">
                        <form method="POST" action="/watch-models/create">
                            @csrf

                            {{-- Identity --}}
                            <div class="nw-section-label">Identity</div>
                            <div class="nw-grid-2">

                                <div class="nw-field nw-field-full">
                                    <label for="brandId" class="nw-label">Brand <span style="color:#8B2020">*</span></label>
                                    <div class="nw-select-wrap">
                                        <select id="brandId" name="brandId" class="nw-select" required>
                                            <option value="" disabled selected>— Select a brand —</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->brandId }}" {{ old('brandId') == $brand->brandId ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('brandId') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field">
                                    <label for="model_name" class="nw-label">Model Name <span style="color:#8B2020">*</span></label>
                                    <input type="text" id="model_name" name="model_name" class="nw-input"
                                        value="{{ old('model_name') }}"
                                        placeholder="e.g. Submariner, Speedmaster"
                                        maxlength="50" required>
                                    @error('model_name') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field">
                                    <label for="reference_number" class="nw-label">Reference Number</label>
                                    <input type="text" id="reference_number" name="reference_number" class="nw-input"
                                        value="{{ old('reference_number') }}"
                                        placeholder="e.g. 126610LN"
                                        maxlength="50">
                                    @error('reference_number') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                            </div>

                            <div class="nw-divider"></div>

                            {{-- Specs --}}
                            <div class="nw-section-label">Specifications</div>
                            <div class="nw-grid-2">

                                <div class="nw-field">
                                    <label for="year" class="nw-label">Year</label>
                                    <input type="number" id="year" name="year" class="nw-input"
                                        value="{{ old('year') }}"
                                        placeholder="e.g. 2021"
                                        min="1800" max="{{ date('Y') }}">
                                    @error('year') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field">
                                    <label for="movement_type" class="nw-label">Movement Type</label>
                                    <div class="nw-select-wrap">
                                        <select id="movement_type" name="movement_type" class="nw-select">
                                            <option value="" {{ old('movement_type') === null ? 'selected' : '' }}>— None —</option>
                                            <option value="manual"    {{ old('movement_type') === 'manual'    ? 'selected' : '' }}>Manual</option>
                                            <option value="automatic" {{ old('movement_type') === 'automatic' ? 'selected' : '' }}>Automatic</option>
                                            <option value="quartz"    {{ old('movement_type') === 'quartz'    ? 'selected' : '' }}>Quartz</option>
                                        </select>
                                    </div>
                                    @error('movement_type') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field nw-field-full">
                                    <label for="desc" class="nw-label">Description</label>
                                    <textarea id="desc" name="desc" class="nw-textarea"
                                        placeholder="Short description about this model..."
                                        maxlength="150">{{ old('desc') }}</textarea>
                                    @error('desc') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                                <div class="nw-field nw-field-full">
                                    <label for="image" class="nw-label">Image URL</label>
                                    <input type="text" id="image" name="image" class="nw-input"
                                        value="{{ old('image') }}"
                                        placeholder="https://example.com/image.jpg"
                                        maxlength="255">
                                    @error('image') <p class="nw-error">{{ $message }}</p> @enderror
                                </div>

                            </div>

                            <div class="nw-divider"></div>

                            <div class="nw-form-actions">
                                <a href="/watch-models" class="nw-btn-back">Back to list</a>
                                <button type="submit" class="nw-btn-submit">Save Model</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
