<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerF1mxngk\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerF1mxngk/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerF1mxngk.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerF1mxngk\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerF1mxngk\appProdProjectContainer([
    'container.build_hash' => 'F1mxngk',
    'container.build_id' => 'de4f0fb5',
    'container.build_time' => 1583321116,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerF1mxngk');
