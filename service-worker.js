const CACHE_NAME = 'V1';
const STATIC_CACHE_URLS = ['/', '/css/style.css', 'index.html'];

self.addEventListener('install', event => {
  console.log('Service Worker installing.');
  event.waitUntil(
    caches.open(CACHE_NAME)
    .then(cache => cache.addAll(STATIC_CACHE_URLS))  
  )
});


self.addEventListener('fetch', event => {
  // Cache-First Strategy
  event.respondWith(
    caches.match(event.request) // check if the request has already been cached
    .then(cached => cached || fetch(event.request)) // otherwise request network
  );
});









function registerBackgroundSync() {
  if (!navigator.serviceWorker){
      return console.error("Service Worker not supported")
  }

  navigator.serviceWorker.ready
  .then(registration => registration.sync.register('syncAttendees'))
  .then(() => console.log("Registered background sync"))
  .catch(err => console.error("Error registering background sync", err))
}









self.addEventListener('sync', function(event) {
	console.log("sync event", event);
    if (event.tag === 'syncAttendees') {
        event.waitUntil(syncAttendees()); // sending sync request
    }
});









function syncAttendees(){
	return update({ url: `https://reqres.in/api/users` })
    	.then(refresh)
    	.then((attendees) => self.registration.showNotification(
    		`${attendees.length} attendees to the PWA Workshop`
    	))
}