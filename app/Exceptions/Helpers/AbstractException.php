<?php

namespace App\Exceptions\Helpers;

use Exception;

/**
 * Class AbstractException
 * @package App\Exceptions\Helpers
 */
abstract class AbstractException extends Exception
{

    protected static array $errorsList = [];

    /**
     * DatabaseException constructor.
     * @param int $error
     * @param $contentToPut
     * @throws Exception
     */
    public function __construct(int $error, $contentToPut)
    {
        $error = static::$errorsList[$error] ?? null;

        if (!$error) {
            throw new Exception('Unknown exception');
        }

        parent::__construct(
            sprintf($error['message'], $contentToPut),
            $error['code']
        );
    }
}
