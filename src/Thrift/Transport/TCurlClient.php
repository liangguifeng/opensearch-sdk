<?php

declare(strict_types=1);

namespace OpenSearch\Thrift\Transport;

use OpenSearch\Thrift\Exception\TTransportException;
use OpenSearch\Thrift\Factory\TStringFuncFactory;

/**
 * HTTP client for Thrift.
 */
class TCurlClient extends TTransport
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
    protected $request_;

    /**
     * Buffer for the HTTP response data.
     *
     * @var binary string
     */
    protected $response_;

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

    private static $curlHandle;

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
        $this->request_ = '';
        $this->response_ = null;
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
        $this->request_ = '';
        $this->response_ = null;
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
        if ($len >= strlen($this->response_)) {
            return $this->response_;
        }
        $ret = substr($this->response_, 0, $len);
        $this->response_ = substr($this->response_, $len);

        return $ret;
    }

    /**
     * Writes some data into the pending buffer.
     *
     * @param string $buf The data to write
     * @throws TTransportException if writing fails
     */
    public function write($buf)
    {
        $this->request_ .= $buf;
    }

    /**
     * Opens and sends the actual request over the HTTP connection.
     *
     * @throws TTransportException if a writing error occurs
     */
    public function flush()
    {
        if (!self::$curlHandle) {
            register_shutdown_function(['Thrift\\Transport\\TCurlClient', 'closeCurlHandle']);
            self::$curlHandle = curl_init();
            curl_setopt(self::$curlHandle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt(self::$curlHandle, CURLOPT_BINARYTRANSFER, true);
            curl_setopt(self::$curlHandle, CURLOPT_USERAGENT, 'PHP/TCurlClient');
            curl_setopt(self::$curlHandle, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt(self::$curlHandle, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt(self::$curlHandle, CURLOPT_MAXREDIRS, 1);
        }
        // God, PHP really has some esoteric ways of doing simple things.
        $host = $this->host_ . ($this->port_ != 80 ? ':' . $this->port_ : '');
        $fullUrl = $this->scheme_ . '://' . $host . $this->uri_;

        $headers = [];
        $defaultHeaders = ['Accept' => 'application/x-thrift',
            'Content-Type' => 'application/x-thrift',
            'Content-Length' => TStringFuncFactory::create()->strlen($this->request_)];
        foreach (array_merge($defaultHeaders, $this->headers_) as $key => $value) {
            $headers[] = "{$key}: {$value}";
        }

        curl_setopt(self::$curlHandle, CURLOPT_HTTPHEADER, $headers);

        if ($this->timeout_ > 0) {
            curl_setopt(self::$curlHandle, CURLOPT_TIMEOUT, $this->timeout_);
        }
        curl_setopt(self::$curlHandle, CURLOPT_POSTFIELDS, $this->request_);
        $this->request_ = '';

        curl_setopt(self::$curlHandle, CURLOPT_URL, $fullUrl);
        $this->response_ = curl_exec(self::$curlHandle);

        // Connect failed?
        if (!$this->response_) {
            curl_close(self::$curlHandle);
            self::$curlHandle = null;
            $error = 'TCurlClient: Could not connect to ' . $fullUrl;
            throw new TTransportException($error, TTransportException::NOT_OPEN);
        }
    }

    public static function closeCurlHandle()
    {
        try {
            if (self::$curlHandle) {
                curl_close(self::$curlHandle);
                self::$curlHandle = null;
            }
        } catch (\Exception $x) {
            error_log('There was an error closing the curl handle: ' . $x->getMessage());
        }
    }

    public function addHeaders($headers)
    {
        $this->headers_ = array_merge($this->headers_, $headers);
    }
}
