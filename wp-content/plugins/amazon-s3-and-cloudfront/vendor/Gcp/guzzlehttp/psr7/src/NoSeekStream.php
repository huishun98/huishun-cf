<?php

namespace DeliciousBrains\WP_Offload_Media\Gcp\GuzzleHttp\Psr7;

use DeliciousBrains\WP_Offload_Media\Gcp\Psr\Http\Message\StreamInterface;
/**
 * Stream decorator that prevents a stream from being seeked
 */
class NoSeekStream implements \DeliciousBrains\WP_Offload_Media\Gcp\Psr\Http\Message\StreamInterface
{
    use StreamDecoratorTrait;
    public function seek($offset, $whence = SEEK_SET)
    {
        throw new \RuntimeException('Cannot seek a NoSeekStream');
    }
    public function isSeekable()
    {
        return false;
    }
}
