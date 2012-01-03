<?php

class InvalidFilenameException extends GpxReaderException
{
    public function __construct($message) {
        parent::__construct($message);
    }
}
