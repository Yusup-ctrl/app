<x-filament-panels::page>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-3">Настройки советника</h3>
            {{ $this->form }}
        </div>

        <div class="col-span-1 lg:col-span-2 space-y-4">
            @if (!empty($this->results))
                @foreach (['economy', 'balanced', 'premium'] as $k)
                    @php $r = $this->results[$k] ?? null; @endphp
                    @if ($r)
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-bold">{{ ucfirst($r['tier']) }} — {{ $r['total_price'] }} €</h4>
                                    <div class="text-sm text-gray-600">{{ $r['explanation'] }}</div>
                                </div>
                                <div class="text-sm text-gray-500">Target: {{ $r['budget_target'] }}€</div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-4">
                                @foreach ($r['components'] as $type => $comp)
                                    <div class="p-3 bg-gray-50 rounded">
                                        <div class="text-xs text-gray-500">{{ strtoupper($type) }}</div>
                                        <div class="font-medium">{{ $comp->name ?? '—' }}</div>
                                        <div class="text-sm text-gray-600">{{ $comp->price ?? '—' }} €</div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-3">
                                <div class="text-sm">Совместимость:</div>
                                <ul class="mt-2">
                                    @foreach ($r['compatibility'] ?? [] as $ck => $cv)
                                        @if ($ck === 'summary_ok')
                                            @continue
                                        @endif
                                        <li>
                                            <span
                                                class="inline-block w-2 h-2 mr-2 rounded-full {{ $cv['ok'] ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                            {{ ucwords(str_replace('_', ' ', $ck)) }} — {{ $cv['message'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</x-filament-panels::page>
