<?php

declare(strict_types=1);

namespace Thrift\Exception;

use Thrift\Type\TType;

class TApplicationException extends TException
{
    public const UNKNOWN = 0;

    public const UNKNOWN_METHOD = 1;

    public const INVALID_MESSAGE_TYPE = 2;

    public const WRONG_METHOD_NAME = 3;

    public const BAD_SEQUENCE_ID = 4;

    public const MISSING_RESULT = 5;

    public const INTERNAL_ERROR = 6;

    public const PROTOCOL_ERROR = 7;

    public const INVALID_TRANSFORM = 8;

    public const INVALID_PROTOCOL = 9;

    public const UNSUPPORTED_CLIENT_TYPE = 10;

    public static $_TSPEC =
      [1 => ['var' => 'message',
          'type' => TType::STRING],
          2 => ['var' => 'code',
              'type' => TType::I32]];

    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }

    public function read($output)
    {
        return $this->_read('TApplicationException', self::$_TSPEC, $output);
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('TApplicationException');
        if ($message = $this->getMessage()) {
            $xfer += $output->writeFieldBegin('message', TType::STRING, 1);
            $xfer += $output->writeString($message);
            $xfer += $output->writeFieldEnd();
        }
        if ($code = $this->getCode()) {
            $xfer += $output->writeFieldBegin('type', TType::I32, 2);
            $xfer += $output->writeI32($code);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();

        return $xfer;
    }
}
