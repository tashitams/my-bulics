let staticCacheName = 'static-cache-v1';

let urlsToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/storage/img/default.png',
    '/img/icon/favicon.ico',
    '/img/icon/favicon-16x16.png',
    '/img/icon/favicon-32x32.png',
    '/img/icon/icon-144x144.png',
    '/img/icon/icon-192x192.png',
    '/img/icon/icon-512x512.png'
];

// install event
self.addEventListener("install", event => {
    event.waitUntil(
        caches.open(staticCacheName).then(cache => {
            return cache.addAll(urlsToCache);
        })
    );
});



// activate event
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(cacheNames
                .filter(cacheName => cacheName !== staticCacheName)
                .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});



// fetch event
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request).then(response => {
            return response || fetch(event.request);
        }).catch(() => caches.match('/offline'))
    );
});

