<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Protocol;

use OpenSearch\Thrift\Type\TMessageType;

/**
 * <code>TMultiplexedProtocol</code> is a protocol-independent concrete decorator
 * that allows a Thrift client to communicate with a multiplexing Thrift server,
 * by prepending the service name to the function name during function calls.
 */
class TMultiplexedProtocol extends TProtocolDecorator
{
    /**
     * Separator between service name and function name.
     * Should be the same as used at multiplexed Thrift server.
     *
     * @var string
     */
    public const SEPARATOR = ':';

    /**
     * The name of service.
     *
     * @var string
     */
    private $serviceName_;

    /**
     * Constructor of <code>TMultiplexedProtocol</code> class.
     *
     * Wrap the specified protocol, allowing it to be used to communicate with a
     * multiplexing server.  The <code>$serviceName</code> is required as it is
     * prepended to the message header so that the multiplexing server can broker
     * the function call to the proper service.
     *
     * @param TProtocol $protocol
     * @param string $serviceName the name of service
     */
    public function __construct(TProtocol $protocol, $serviceName)
    {
        parent::__construct($protocol);
        $this->serviceName_ = $serviceName;
    }

    /**
     * Writes the message header.
     * Prepends the service name to the function name, separated by <code>TMultiplexedProtocol::SEPARATOR</code>.
     *
     * @param string $name function name
     * @param int $type message type
     * @param int $seqid the sequence id of this message
     */
    public function writeMessageBegin($name, $type, $seqid)
    {
        if ($type == TMessageType::CALL || $type == TMessageType::ONEWAY) {
            $nameWithService = $this->serviceName_ . self::SEPARATOR . $name;
            parent::writeMessageBegin($nameWithService, $type, $seqid);
        } else {
            parent::writeMessageBegin($name, $type, $seqid);
        }
    }
}
