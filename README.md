# LaraTime

Provides a cool way to make your system realtime by sending real-time database updates using WebSockets

## Installation

- Setup websocket in your application ([Pusher](https://pusher.com/), [Laravel-Websockets](https://beyondco.de/docs/laravel-websockets/getting-started/installation))
- Require this package in your project

```sh
$ composer require rakeshthapac/laratime
```

- Now install small npm package [laratime-js](https://www.npmjs.com/package/laratime-js)

```sh
$ npm install laratime-js
```

## Usage

- Just plug one trait into your model and you are ready to go

```php
use \rakeshthapac\LaraTime\Traits\LaraTimeable;
// now all your database updates will be broadcasted through websockets
```

## Usage (Frontend [laratime-js](https://www.npmjs.com/package/laratime-js))

- import laratime from laratime-js and pass it the Echo instance

```js
// in bootstrap.js
// first create a instance of a echo with correct credentials
import LaraTime from "laratime-js";
window.laratime = new LaraTime(window.Echo);
```

- Now you are ready to listen for database changes

```js
window.laratime
  .db("users")
  .on("added", (user) => addUser(user))
  .on("updated", (user) => updateUser(user))
  .on("deleted", (user) => deletesUser(user));
```

- Using laratime-js you can listen to updates of a table using **db(tableName)** and by chaining **on(eventName)** you can listen to different evetnts:
  - added
  - updated
  - deleted
- You can hook a callaback which accepts the added (or updated or deleted) model as the first argument as javascript object.
