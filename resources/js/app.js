import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import { initializeSlug } from './utils/slug';
import { initializeFileUpload } from './utils/file-upload';

// Initialize reusable utilities
initializeSlug();
initializeFileUpload();
