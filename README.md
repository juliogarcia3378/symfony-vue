A Symfony hybrid app sharing state object with Twig and Vue
==========

## Installation

Clone app:


Install dependencies:

```
composer install
```

Run:

```
./bin/console server:run
```

Open app in browser: http://localhost:8000

## JavaScript builds

There are three separate client implementations included, React, Vue.js and Vanilla JavaScript (via TypeScript). If you want to try modifications to the behaviour of the clients you'll need to do some build setup:

### Vue.js

No Vue there is build process, just start editing `src/AppBundle/Resources/public/js/vue/app.js`. Note that example uses some the ES6+ syntax is not supported natively everywhere, so you'll need an up-to-date browser.



An article with the background is published here: <a href="https://www.symfony.fi/entry/sharing-state-in-a-symfony-hybrid-app-with-twig-react-etc">Sharing state in a Symfony hybrid with Twig, React and other JavaScript apps</a>
