<?php

namespace Drupal\jsonplaceholder;

use Drupal\Component\Serialization\Json;
use Drupal\Core\Http\ClientFactory;
use Drupal\Core\Queue\RequeueException;

/**
 * Class JsonplaceholderClient.
 *
 * @package Drupal\jsonplaceholder
 */
class JsonplaceholderClient {

  /**
   * The HTTP client.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $client;

  public function __construct(ClientFactory $http_client_factory) {
    $this->client = $http_client_factory->fromOptions([
      'base_uri' => 'https://jsonplaceholder.typicode.com',
      'timeout' => 3,
    ]);
  }

  /**
   * Get posts from the jsonplaceholder webpage.
   */
  public function getPosts() {
    try{
      $response = $this->client->get('posts');
    }catch (RequeueException $e){
      \Drupal::logger('jsonplaceholder')->warning($e->getMessage());
      return [];
    }
    return array_slice(Json::decode($response->getBody()), 0 ,10);;

  }

}

