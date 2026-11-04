<?php
declare(strict_types=1);

$requestPath = rawurldecode((string) (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'));

if (
    preg_match('~(?:^|/)\.(?:[^/]+)(?:/|$)~', $requestPath) ||
    preg_match('~(?:^|/)(?:attached_assets|\.git|\.local|\.agents|\.cache)(?:/|$)~i', $requestPath) ||
    preg_match('~(?:^|/)logo_ites\.jpg$~i', $requestPath)
) {
    http_response_code(404);
    exit('Not found');
}

if ($requestPath === '/') {
    $_SERVER['PHP_SELF'] = '/index.php';
    require __DIR__ . '/index.php';
    return true;
}

if (preg_match('~^/(?:index|about|services|contact)\.php$~', $requestPath)) {
    return false;
}

if (preg_match('~^/assets/(?:css|js|images)/[A-Za-z0-9._/-]+$~', $requestPath)) {
    $file = realpath(__DIR__ . $requestPath);
    $assetRoot = realpath(__DIR__ . '/assets');
    if (
        $file !== false &&
        $assetRoot !== false &&
        str_starts_with($file, $assetRoot . DIRECTORY_SEPARATOR) &&
        is_file($file)
    ) {
        return false;
    }
}

http_response_code(404);
exit('Not found');
