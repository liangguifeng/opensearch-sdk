<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Transport;

use OpenSearch\Thrift\Exception\TTransportException;
use OpenSearch\Thrift\Factory\TStringFuncFactory;

/**
 * HTTP client for Thrift.
 */
class THttpClient extends TTransport
{
    /**
     * The host to connect to.
     *
     * @var string
     */
    protected $host_;

    /**
     * The port to connect on.
     *
     * @var int
     */
    protected $port_;

    /**
     * The URI to request.
     *
     * @var string
     */
    protected $uri_;

    /**
     * The scheme to use for the request, i.e. http, https.
     *
     * @var string
     */
    protected $scheme_;

    /**
     * Buffer for the HTTP request data.
     *
     * @var string
     */
    protected $buf_;

    /**
     * Input socket stream.
     *
     * @var resource
     */
    protected $handle_;

    /**
     * Read timeout.
     *
     * @var float
     */
    protected $timeout_;

    /**
     * http headers.
     *
     * @var array
     */
    protected $headers_;

    /**
     * Make a new HTTP client.
     *
     * @param string $host
     * @param int $port
     * @param string $uri
     * @param mixed $scheme
     */
    public function __construct($host, $port = 80, $uri = '', $scheme = 'http')
    {
        if ((TStringFuncFactory::create()->strlen($uri) > 0) && ($uri[0] != '/')) {
            $uri = '/' . $uri;
        }
        $this->scheme_ = $scheme;
        $this->host_ = $host;
        $this->port_ = $port;
        $this->uri_ = $uri;
        $this->buf_ = '';
        $this->handle_ = null;
        $this->timeout_ = null;
        $this->headers_ = [];
    }

    /**
     * Set read timeout.
     *
     * @param float $timeout
     */
    public function setTimeoutSecs($timeout)
    {
        $this->timeout_ = $timeout;
    }

    /**
     * Whether this transport is open.
     *
     * @return bool true if open
     */
    public function isOpen()
    {
        return true;
    }

    /**
     * Open the transport for reading/writing.
     *
     * @throws TTransportException if cannot open
     */
    public function open() {}

    /**
     * Close the transport.
     */
    public function close()
    {
        if ($this->handle_) {
            @fclose($this->handle_);
            $this->handle_ = null;
        }
    }

    /**
     * Read some data into the array.
     *
     * @param int $len How much to read
     * @return string The data that has been read
     * @throws TTransportException if cannot read any more data
     */
    public function read($len)
    {
        $data = @fread($this->handle_, $len);
        if ($data === false || $data === '') {
            $md = stream_get_meta_data($this->handle_);
            if ($md['timed_out']) {
                throw new TTransportException('THttpClient: timed out reading ' . $len . ' bytes from ' . $this->host_ . ':' . $this->port_ . $this->uri_, TTransportException::TIMED_OUT);
            }
            throw new TTransportException('THttpClient: Could not read ' . $len . ' bytes from ' . $this->host_ . ':' . $this->port_ . $this->uri_, TTransportException::UNKNOWN);
        }

        return $data;
    }

    /**
     * Writes some data into the pending buffer.
     *
     * @param string $buf The data to write
     * @throws TTransportException if writing fails
     */
    public function write($buf)
    {
        $this->buf_ .= $buf;
    }

    /**
     * Opens and sends the actual request over the HTTP connection.
     *
     * @throws TTransportException if a writing error occurs
     */
    public function flush()
    {
        // God, PHP really has some esoteric ways of doing simple things.
        $host = $this->host_ . ($this->port_ != 80 ? ':' . $this->port_ : '');

        $headers = [];
        $defaultHeaders = ['Host' => $host,
            'Accept' => 'application/x-thrift',
            'User-Agent' => 'PHP/THttpClient',
            'Content-Type' => 'application/x-thrift',
            'Content-Length' => TStringFuncFactory::create()->strlen($this->buf_)];
        foreach (array_merge($defaultHeaders, $this->headers_) as $key => $value) {
            $headers[] = "{$key}: {$value}";
        }

        $options = ['method' => 'POST',
            'header' => implode("\r\n", $headers),
            'max_redirects' => 1,
            'content' => $this->buf_];
        if ($this->timeout_ > 0) {
            $options['timeout'] = $this->timeout_;
        }
        $this->buf_ = '';

        $contextid = stream_context_create(['http' => $options]);
        $this->handle_ = @fopen($this->scheme_ . '://' . $host . $this->uri_, 'r', false, $contextid);

        // Connect failed?
        if ($this->handle_ === false) {
            $this->handle_ = null;
            $error = 'THttpClient: Could not connect to ' . $host . $this->uri_;
            throw new TTransportException($error, TTransportException::NOT_OPEN);
        }
    }

    public function addHeaders($headers)
    {
        $this->headers_ = array_merge($this->headers_, $headers);
    }
}
