<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Document: ' . $document->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('documents.update', $document) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $document->title)" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <p class="text-sm text-gray-600">Current File: <span class="font-semibold">{{ $document->file_name }}</span></p>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="document" :value="__('Replace Document File (Optional)')" />
                            <input id="document" name="document" type="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"/>
                            <x-input-error :messages="$errors->get('document')" class="mt-2" />
                            <p class="mt-1 text-xs text-gray-500">Leave blank to keep current file. Max size 200MB. Allowed types: PDF, DOC, DOCX, XLSX, XLS, TXT, ZIP.</p>
                        </div>

                        <div class="mt-4">
                            <label for="is_published" class="inline-flex items-center">
                                <input id="is_published" type="checkbox" name="is_published" value="1" {{ old('is_published', $document->is_published) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Publish to Employees (Welcome Page)') }}</span>
                            </label>
                            <x-input-error :messages="$errors->get('is_published')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update Document') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>