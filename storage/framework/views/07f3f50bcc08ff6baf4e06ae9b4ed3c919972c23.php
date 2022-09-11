<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>How To Install Vue 3 in Laravel 9 with Vite</title>

        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    </head>
    <body>
    <div id="app"></div>

    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <link href="https://unpkg.com/video.js/dist/video-js.css" rel="stylesheet">
    <script src="https://unpkg.com/video.js/dist/video.js"></script>
    <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
    </body>
</html>
<?php /**PATH D:\PhpProjects\laravel-streamer-nimble\resources\views/index.blade.php ENDPATH**/ ?>