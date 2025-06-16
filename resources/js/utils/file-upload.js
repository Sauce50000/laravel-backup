export function updateFileName(input) {
    const fileName = input.files.length ? input.files[0].name : '';
    const fileNameElement = document.getElementById('file-name');
    const fileNameText = document.getElementById('file-name-text');
    const fileIconElement = document.getElementById('file-icon');

    if (fileName && fileNameElement && fileNameText) {
        fileNameText.textContent = `Selected file: ${fileName}`;
        fileNameElement.classList.remove('hidden');
        if (fileIconElement) {
            fileIconElement.classList.add('hidden');
        }
    } else if (fileNameElement && fileNameText) {
        fileNameText.textContent = '';
        fileNameElement.classList.add('hidden');
        if (fileIconElement) {
            fileIconElement.classList.remove('hidden');
        }
    }
}

export function initializeFileUpload() {
    const fileInput = document.getElementById('file_path');
    if (fileInput) {
        fileInput.addEventListener('change', (e) => updateFileName(e.target));
    }
}

/*
html usage:
<div class="mb-6">
    <label for="file_path" class="block text-lg font-semibold text-gray-700 mb-2">Upload PDF</label>

    <div
        class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-500 transition duration-200">

        <input type="file" name="file_path" id="file_path"
            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="application/pdf"
            onchange="updateFileName(this)" required>

            <div id="file-icon">
                <i class="fa-solid fa-file-lines text-4xl text-blue-400 mb-2"></i>
                <p class="text-gray-500">Drag and drop your PDF here or <span
                    class="text-blue-600 font-medium hover:underline">click to upload</span></p>
            </div>
            <p id="file-name" class="text-sm text-gray-600 mt-2 hidden">
                <span id="file-name-text"></span>
                <i class="fa-solid fa-pen-to-square text-blue-600 font-medium"></i>
            </p>
    </div>

    @error('file_path')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
*/