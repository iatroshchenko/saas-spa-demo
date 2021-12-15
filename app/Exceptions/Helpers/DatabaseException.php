<?php

namespace App\Exceptions\Helpers;

use Exception;

/**
 * Class DatabaseException
 * @package App\Exceptions\Helpers
 *
 * @property array $list
 */
class DatabaseException extends AbstractException {

    const TYPE_RECORD_NOT_FOUND = 1;
    const TYPE_OPERATION_FAILED = 2;

    protected static array $errorsList = [
        self::TYPE_RECORD_NOT_FOUND => [
            'code' => 404,
            'message' => 'Record %s doesn\'t exist!',
        ],
        self::TYPE_OPERATION_FAILED => [
            'code' => 405,
            'message' => 'DB exception: %s',
        ]
    ];

    /**
     * @param $identifier
     * @return static
     * @throws Exception
     */
    public static function notFound($identifier): self
    {
        return new self(self::TYPE_RECORD_NOT_FOUND, $identifier);
    }

    /**
     * @param string $message
     * @return DatabaseException
     * @throws Exception
     */
    public static function operationFailed(string $message)
    {
        return new self(self::TYPE_OPERATION_FAILED, $message);
    }
}
