<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Add New Brand
        </h2>
    </x-slot>

    <style>
        .nw-section { padding: 2.5rem 1rem; }

        .nw-form-card {
            max-width: 560px;
            margin: 0 auto;
        }

        .nw-card-header {
            text-align: center;
            padding: 1.75rem 2rem 0;
        }

        .nw-ornament {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 1rem;
            opacity: 0.4;
        }
        .nw-ornament-line { width: 40px; height: 1px; background: var(--gold, #C9A84C); }
        .nw-ornament-diamond { width: 5px; height: 5px; background: var(--gold, #C9A84C); transform: rotate(45deg); }

        .nw-card-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.62rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: var(--gold, #C9A84C);
            display: block;
            margin-bottom: 0.3rem;
        }

        .nw-card-heading {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 400;
            color: var(--nw-text-primary, #1A1008);
            margin-bottom: 1.5rem;
        }

        .nw-form-body { padding: 1.5rem 2rem 2rem; }

        .nw-field { margin-bottom: 1.5rem; }

        .nw-label {
            display: block;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.65rem;
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--nw-text-secondary, #6B4F35);
            margin-bottom: 0.45rem;
        }

        .nw-input,
        .nw-textarea {
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
        }

        .nw-input:focus,
        .nw-textarea:focus {
            border-color: var(--gold, #C9A84C);
            background: rgba(255, 252, 248, 0.95);
            box-shadow: 0 0 0 2px rgba(201, 168, 76, 0.12);
        }

        .nw-textarea { resize: vertical; min-height: 100px; }

        .nw-error {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.72rem;
            color: #8B2020;
            margin-top: 0.35rem;
        }

        /* Divider */
        .nw-divider {
            height: 1px;
            background: rgba(201, 168, 76, 0.2);
            margin: 1.5rem 0;
        }

        /* Actions */
        .nw-form-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .nw-btn-back {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 0.88rem;
            color: var(--nw-text-secondary, #6B4F35);
            text-decoration: none;
            letter-spacing: 0.03em;
            transition: color 0.2s;
        }
        .nw-btn-back:hover { color: var(--dark-brown, #2C1810); text-decoration: underline; text-underline-offset: 3px; }
        .nw-btn-back::before { content: '← '; }

        .nw-btn-submit {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 0.8rem 2rem;
            background: var(--dark-brown, #2C1810);
            color: var(--gold-light, #E8C97A);
            border: 1px solid var(--dark-brown, #2C1810);
            border-radius: 0;
            cursor: pointer;
            transition: background 0.2s;
            position: relative;
        }
        .nw-btn-submit::after {
            content: '';
            position: absolute;
            inset: 3px;
            border: 1px solid rgba(201,168,76,0.3);
            pointer-events: none;
        }
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
                        <span class="nw-card-title">Brand Management</span>
                        <h2 class="nw-card-heading">Add New Brand</h2>
                    </div>

                    <div class="nw-form-body">
                        <form method="POST" action="/brands/create">
                            @csrf

                            <div class="nw-field">
                                <label for="name" class="nw-label">Brand Name <span style="color:#8B2020">*</span></label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="nw-input"
                                    value="{{ old('name') }}"
                                    placeholder="e.g. Rolex, Seiko, Orient"
                                    required
                                >
                                @error('name')
                                    <p class="nw-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="nw-field">
                                <label for="desc" class="nw-label">Description</label>
                                <textarea
                                    id="desc"
                                    name="desc"
                                    class="nw-textarea"
                                    placeholder="Short description about this brand..."
                                >{{ old('desc') }}</textarea>
                                @error('desc')
                                    <p class="nw-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="nw-divider"></div>

                            <div class="nw-form-actions">
                                <a href="/brands" class="nw-btn-back">Back to list</a>
                                <button type="submit" class="nw-btn-submit">Save Brand</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
