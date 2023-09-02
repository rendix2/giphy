Giphy API
=================

Its very lighweight library to communicate with giphy.com API.

You can install it via `composer require rendix2/giphy`.

Example of usage 

`$giphy = new Giphy('{ApikEy}', new \GuzzleHttp\Client());`

`$result = $giphy->search('fast car');`

That's all Enjoy.



