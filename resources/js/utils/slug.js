export function generateSlug() {
    const title = document.getElementById('title_en').value;
    let slug = title
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-') // Replace non-alphanumeric with hyphen
        .replace(/^-+|-+$/g, '') // Trim hyphens from start/end
        .replace(/--+/g, '-'); // Replace multiple hyphens with single
    const slugField = document.getElementById('slug');
    if (slugField) {
        slugField.value = slug || '';
        // Update Alpine.js data if using x-data
        if (window.Alpine) {
            const alpineElement = document.querySelector('[x-data] [id="slug"]');
            if (alpineElement && alpineElement._x_data) {
                alpineElement._x_data.slug = slug;
            }
        }
    }
}

export function initializeSlug() {
    const titleInput = document.getElementById('title_en');
    const slugField = document.getElementById('slug');
    if (titleInput && slugField) {
        // Generate slug on page load if title_en has a value
        if (titleInput.value) {
            generateSlug();
        }
        // Add event listener for real-time slug updates
        titleInput.addEventListener('keyup', generateSlug);
    }
}

{/* 
    usage in Blade template:
    <div>
    <label for="title_en" class="block text-lg font-medium text-gray-700 mb-2">Title (English)</label>
    <input type="text" name="title_en" id="title_en" value="{{ old('title_en') }}"
        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
        placeholder="Enter notice title in English" onkeyup="generateSlug()">
    @error('title_en')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
<div>
    <label for="slug" class="block text-lg font-medium text-gray-700 mb-2">Slug</label>
    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 placeholder-gray-400"
        placeholder="Auto-generated slug" x-data="{ slug: '{{ old('slug') }}' }" x-init="generateSlug()"
        x-on:titlekeyup="generateSlug()">
    @error('slug')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div> 
*/}
