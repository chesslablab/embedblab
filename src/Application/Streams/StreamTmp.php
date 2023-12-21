<?php

namespace App\Application\Streams;

use Slim\Psr7\Stream;

class StreamTmp extends Stream
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        $fh = fopen($filename, 'rb');

        parent::__construct($fh);
    }

    public function __destruct()
    {
        unlink($this->filename);
    }
}
