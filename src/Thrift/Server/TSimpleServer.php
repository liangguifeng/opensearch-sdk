<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Server;

use OpenSearch\Thrift\Exception\TTransportException;

/**
 * Simple implemtation of a Thrift server.
 */
class TSimpleServer extends TServer
{
    /**
     * Flag for the main serving loop.
     *
     * @var bool
     */
    private $stop_ = false;

    /**
     * Listens for new client using the supplied
     * transport. It handles TTransportExceptions
     * to avoid timeouts etc killing it.
     */
    public function serve()
    {
        $this->transport_->listen();

        while (!$this->stop_) {
            try {
                $transport = $this->transport_->accept();

                if ($transport != null) {
                    $inputTransport = $this->inputTransportFactory_->getTransport($transport);
                    $outputTransport = $this->outputTransportFactory_->getTransport($transport);
                    $inputProtocol = $this->inputProtocolFactory_->getProtocol($inputTransport);
                    $outputProtocol = $this->outputProtocolFactory_->getProtocol($outputTransport);
                    while ($this->processor_->process($inputProtocol, $outputProtocol));
                }
            } catch (TTransportException $e) {
            }
        }
    }

    /**
     * Stops the server running. Kills the transport
     * and then stops the main serving loop.
     */
    public function stop()
    {
        $this->transport_->close();
        $this->stop_ = true;
    }
}
