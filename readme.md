Giphy API
=================

Its very lightweight library to communicate with giphy.com API.

You can install it via `composer require rendix2/giphy`.

Example of usage 

`$giphy = new \Rendix2\Giphy\Giphy('{ApiKey}', new \GuzzleHttp\Client());`

`$result = $giphy->search('fast car');`

That's all Enjoy.



