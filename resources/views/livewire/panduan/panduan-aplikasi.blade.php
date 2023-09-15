<div>
    <section class="flex flex-col md:flex-row gap-8 items-start justify-start">
        <x-card title="Form Panduan Aplikasi" class="w-1/2">
            <div class="w-full">
                <select wire:model="selectedCategory"
                    class="bg-gray-50 border border-gray-300/90 text-gray-500/90 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" selected>Pilih Panduan</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['name'] }}">{{ $category['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="my-4 w-full">
                <form wire:submit.prevent="save">
                    <div class="gap-4">
                        <input type="hidden" name="panduanId" wire:model="panduanId">
                        <div>
                            <input type="file" wire:model.debounce.500ms="image" accept="image/*">
                            @error('image')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="step"
                                class="block mb-2 text-sm font-medium text-gray-500 dark:text-white">Langkah </label>
                            <input wire:model="step" type="number" id="step" class="bw-input" placeholder=""
                                required>
                        </div>
                        <div class="flex flex-row items-center justify-center">
                            <x-input wire:model="title" name="title" type="text" label="Judul Panduan"
                                required="true" />
                        </div>
                        <div>
                            <x-textarea wire:model="content" name="content" label="Deskripsi panduan" required="true" />
                        </div>
                        {{-- <div>
                            <x-filepicker wire:model="file" name="file" max_file_size="1" accepted_file_types=".pdf"
                                placeholder="Tambahkan file *.pdf jika diperlukan" />
                        </div> --}}
                        <div>
                            <input type="file" wire:model="document" accept=".pdf">
                            @error('file')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <x-button class="w-full" size="small" color="indigo" can_submit="true">Tambah</x-button>
                    </div>
                </form>
            </div>
        </x-card>

        <div>
            <x-card title="Panduan Aplikasi" class="w-full">
                <div class="my-4 w-full">
                    <ol class="relative border-l border-gray-200 dark:border-gray-700">
                        @forelse ($panduans as $item)
                            <li class="mb-10 ml-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 bg-indigo-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-indigo-900">
                                    {{ $item->step }}
                                </span>
                                <img src="{{ $item->image }}"
                                    class="object-cover object-center h-36 w-full max-w-full rounded-lg shadow-md"
                                    alt="{{ $item->title }}">
                                <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $item->title }}
                                </h3>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                    {{ Str::limit($item->content, 250, '...') }}
                                </p>
                                @if ($item->file != null)
                                    <a href="#"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-indigo-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-indigo-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                        <x-icon name="document-arrow-down" class="w-3.5 h-3.5 mr-2.5" />
                                        Panduan {{ $item->title }}
                                    </a>
                                @endif
                            </li>

                        @empty
                            <li class="mb-10 ml-6">
                                <span
                                    class="absolute flex items-center justify-center w-6 h-6 bg-indigo-100 rounded-full -left-3 ring-8 ring-white dark:ring-gray-900 dark:bg-indigo-900">
                                </span>
                                <div class="tracking-wide text-sm text-gray-500/90">Anda belum membuat panduan mengenai
                                    penggunaan
                                    aplikasi</div>
                            </li>
                        @endforelse
                    </ol>
                </div>
            </x-card>
        </div>
    </section>
</div>
