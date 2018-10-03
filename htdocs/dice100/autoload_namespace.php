<?PHP
/**
 * Autoloader for classes with namespace, exclude the vendor name.
 *
 *
 */
spl_autoload_register(function ($class) {
    // echo "$class<br>"

    // Base directory for the namespace prefix
    $baseDir = __DIR__ . "/src/";

    // Remove the vendor-part
    $offset = strpos($class, "\\") + 1;

    // Get the relative class name
    $relativeClass = substr($class, $offset);

    // Replace the namespace prefix with the base directory, replace namespace
    // seperators with directory seperators in the relative class name, append
    // with .php
    $file = $baseDir . str_replace("\\", "/", $relativeClass) . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
