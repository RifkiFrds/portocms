<?php

if (!function_exists('uploadFile')) {
    /**
     * Uploads a file securely.
     *
     * @param array $file The $_FILES['name'] array.
     * @param string $targetDir The target directory path relative to project root.
     * @param array $allowedExtensions Array of allowed file extensions.
     * @param int $maxSize Max size in bytes.
     * @return string|false Return filename if success, false if failed.
     */
    function uploadFile(array $file, string $targetDir, array $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf'], int $maxSize = 5242880) {
        if (!isset($file['error']) || is_array($file['error'])) {
            return false;
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        if ($file['size'] > $maxSize) {
            return false;
        }

        $filename = basename($file['name']);
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExtensions)) {
            return false;
        }

        // Generate a secure, unique name to prevent collisions/injections
        $uniqueName = uniqid('file_', true) . '.' . $ext;
        
        $absoluteTargetDir = __DIR__ . '/../../' . rtrim($targetDir, '/') . '/';
        
        if (!is_dir($absoluteTargetDir)) {
            mkdir($absoluteTargetDir, 0755, true);
        }

        $destination = $absoluteTargetDir . $uniqueName;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return $uniqueName;
        }

        return false;
    }
}
