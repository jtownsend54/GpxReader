<?php

class GpxReaderException extends Exception
{
    /**
     * Create a new SwiftException with $message.
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
