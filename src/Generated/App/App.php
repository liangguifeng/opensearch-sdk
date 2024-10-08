<?php

namespace OpenSearch\Generated\App;

use OpenSearch\Generated\FirstRank\FirstRank;
use Thrift\Exception\TProtocolException;
use Thrift\Type\TType;

class App
{
    public static $_TSPEC;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $type = 'advance';

    /**
     * @var Schema
     */
    public $schema;

    /**
     * @var Quota
     */
    public $quota;

    /**
     * @var string
     */
    public $description;

    /**
     * @var Group
     */
    public $group;

    /**
     * @var bool
     */
    public $auto_switch;

    /**
     * @var int
     */
    public $switch_time;

    /**
     * @var string[]
     */
    public $fetch_fields;

    /**
     * @var array
     */
    public $first_ranks;

    /**
     * @var string
     */
    public $virtual_cluster;

    /**
     * @var bool
     */
    public $realtime_shared;

    /**
     * @var int
     */
    public $status;

    /**
     * @var int
     */
    public $data_progress;

    /**
     * @var int
     */
    public $progress_percent;

    /**
     * @var bool
     */
    public $rebuilding;

    /**
     * @var int
     */
    public $unread_error_count;

    /**
     * @var int
     */
    public $action_cause;

    public function __construct($vals = null)
    {
        if (!isset(self::$_TSPEC)) {
            self::$_TSPEC = [
                1 => [
                    'var' => 'id',
                    'type' => TType::STRING,
                ],
                10 => [
                    'var' => 'name',
                    'type' => TType::STRING,
                ],
                11 => [
                    'var' => 'type',
                    'type' => TType::STRING,
                ],
                12 => [
                    'var' => 'schema',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\App\Schema',
                ],
                13 => [
                    'var' => 'quota',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\App\Quota',
                ],
                14 => [
                    'var' => 'description',
                    'type' => TType::STRING,
                ],
                15 => [
                    'var' => 'group',
                    'type' => TType::STRUCT,
                    'class' => '\OpenSearch\Generated\App\Group',
                ],
                16 => [
                    'var' => 'auto_switch',
                    'type' => TType::BOOL,
                ],
                17 => [
                    'var' => 'switch_time',
                    'type' => TType::I32,
                ],
                18 => [
                    'var' => 'fetch_fields',
                    'type' => TType::LST,
                    'etype' => TType::STRING,
                    'elem' => [
                        'type' => TType::STRING,
                    ],
                ],
                19 => [
                    'var' => 'first_ranks',
                    'type' => TType::MAP,
                    'ktype' => TType::STRING,
                    'vtype' => TType::STRUCT,
                    'key' => [
                        'type' => TType::STRING,
                    ],
                    'val' => [
                        'type' => TType::STRUCT,
                        'class' => '\OpenSearch\Generated\FirstRank\FirstRank',
                    ],
                ],
                20 => [
                    'var' => 'virtual_cluster',
                    'type' => TType::STRING,
                ],
                21 => [
                    'var' => 'realtime_shared',
                    'type' => TType::BOOL,
                ],
                100 => [
                    'var' => 'status',
                    'type' => TType::I32,
                ],
                101 => [
                    'var' => 'data_progress',
                    'type' => TType::I32,
                ],
                102 => [
                    'var' => 'progress_percent',
                    'type' => TType::I32,
                ],
                103 => [
                    'var' => 'rebuilding',
                    'type' => TType::BOOL,
                ],
                104 => [
                    'var' => 'unread_error_count',
                    'type' => TType::I32,
                ],
                105 => [
                    'var' => 'action_cause',
                    'type' => TType::I32,
                ],
            ];
        }
        if (is_array($vals)) {
            if (isset($vals['id'])) {
                $this->id = $vals['id'];
            }
            if (isset($vals['name'])) {
                $this->name = $vals['name'];
            }
            if (isset($vals['type'])) {
                $this->type = $vals['type'];
            }
            if (isset($vals['schema'])) {
                $this->schema = $vals['schema'];
            }
            if (isset($vals['quota'])) {
                $this->quota = $vals['quota'];
            }
            if (isset($vals['description'])) {
                $this->description = $vals['description'];
            }
            if (isset($vals['group'])) {
                $this->group = $vals['group'];
            }
            if (isset($vals['auto_switch'])) {
                $this->auto_switch = $vals['auto_switch'];
            }
            if (isset($vals['switch_time'])) {
                $this->switch_time = $vals['switch_time'];
            }
            if (isset($vals['fetch_fields'])) {
                $this->fetch_fields = $vals['fetch_fields'];
            }
            if (isset($vals['first_ranks'])) {
                $this->first_ranks = $vals['first_ranks'];
            }
            if (isset($vals['virtual_cluster'])) {
                $this->virtual_cluster = $vals['virtual_cluster'];
            }
            if (isset($vals['realtime_shared'])) {
                $this->realtime_shared = $vals['realtime_shared'];
            }
            if (isset($vals['status'])) {
                $this->status = $vals['status'];
            }
            if (isset($vals['data_progress'])) {
                $this->data_progress = $vals['data_progress'];
            }
            if (isset($vals['progress_percent'])) {
                $this->progress_percent = $vals['progress_percent'];
            }
            if (isset($vals['rebuilding'])) {
                $this->rebuilding = $vals['rebuilding'];
            }
            if (isset($vals['unread_error_count'])) {
                $this->unread_error_count = $vals['unread_error_count'];
            }
            if (isset($vals['action_cause'])) {
                $this->action_cause = $vals['action_cause'];
            }
        }
    }

    public function getName()
    {
        return 'App';
    }

    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->name);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 11:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->type);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 12:
                    if ($ftype == TType::STRUCT) {
                        $this->schema = new Schema();
                        $xfer += $this->schema->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 13:
                    if ($ftype == TType::STRUCT) {
                        $this->quota = new Quota();
                        $xfer += $this->quota->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 14:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->description);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 15:
                    if ($ftype == TType::STRUCT) {
                        $this->group = new Group();
                        $xfer += $this->group->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 16:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->auto_switch);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 17:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->switch_time);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 18:
                    if ($ftype == TType::LST) {
                        $this->fetch_fields = [];
                        $_size55 = 0;
                        $_etype58 = 0;
                        $xfer += $input->readListBegin($_etype58, $_size55);
                        for ($_i59 = 0; $_i59 < $_size55; ++$_i59) {
                            $elem60 = null;
                            $xfer += $input->readString($elem60);
                            $this->fetch_fields[] = $elem60;
                        }
                        $xfer += $input->readListEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 19:
                    if ($ftype == TType::MAP) {
                        $this->first_ranks = [];
                        $_size61 = 0;
                        $_ktype62 = 0;
                        $_vtype63 = 0;
                        $xfer += $input->readMapBegin($_ktype62, $_vtype63, $_size61);
                        for ($_i65 = 0; $_i65 < $_size61; ++$_i65) {
                            $key66 = '';
                            $val67 = new FirstRank();
                            $xfer += $input->readString($key66);
                            $val67 = new FirstRank();
                            $xfer += $val67->read($input);
                            $this->first_ranks[$key66] = $val67;
                        }
                        $xfer += $input->readMapEnd();
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 20:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->virtual_cluster);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 21:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->realtime_shared);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 100:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->status);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 101:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->data_progress);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 102:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->progress_percent);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 103:
                    if ($ftype == TType::BOOL) {
                        $xfer += $input->readBool($this->rebuilding);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 104:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->unread_error_count);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 105:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->action_cause);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('App');
        if ($this->id !== null) {
            $xfer += $output->writeFieldBegin('id', TType::STRING, 1);
            $xfer += $output->writeString($this->id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->name !== null) {
            $xfer += $output->writeFieldBegin('name', TType::STRING, 10);
            $xfer += $output->writeString($this->name);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->type !== null) {
            $xfer += $output->writeFieldBegin('type', TType::STRING, 11);
            $xfer += $output->writeString($this->type);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->schema !== null) {
            if (!is_object($this->schema)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('schema', TType::STRUCT, 12);
            $xfer += $this->schema->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->quota !== null) {
            if (!is_object($this->quota)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('quota', TType::STRUCT, 13);
            $xfer += $this->quota->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->description !== null) {
            $xfer += $output->writeFieldBegin('description', TType::STRING, 14);
            $xfer += $output->writeString($this->description);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->group !== null) {
            if (!is_object($this->group)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('group', TType::STRUCT, 15);
            $xfer += $this->group->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->auto_switch !== null) {
            $xfer += $output->writeFieldBegin('auto_switch', TType::BOOL, 16);
            $xfer += $output->writeBool($this->auto_switch);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->switch_time !== null) {
            $xfer += $output->writeFieldBegin('switch_time', TType::I32, 17);
            $xfer += $output->writeI32($this->switch_time);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->fetch_fields !== null) {
            if (!is_array($this->fetch_fields)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('fetch_fields', TType::LST, 18);

            $output->writeListBegin(TType::STRING, count($this->fetch_fields));

            foreach ($this->fetch_fields as $iter68) {
                $xfer += $output->writeString($iter68);
            }

            $output->writeListEnd();

            $xfer += $output->writeFieldEnd();
        }
        if ($this->first_ranks !== null) {
            if (!is_array($this->first_ranks)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('first_ranks', TType::MAP, 19);

            $output->writeMapBegin(TType::STRING, TType::STRUCT, count($this->first_ranks));

            foreach ($this->first_ranks as $kiter69 => $viter70) {
                $xfer += $output->writeString($kiter69);
                $xfer += $viter70->write($output);
            }

            $output->writeMapEnd();

            $xfer += $output->writeFieldEnd();
        }
        if ($this->virtual_cluster !== null) {
            $xfer += $output->writeFieldBegin('virtual_cluster', TType::STRING, 20);
            $xfer += $output->writeString($this->virtual_cluster);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->realtime_shared !== null) {
            $xfer += $output->writeFieldBegin('realtime_shared', TType::BOOL, 21);
            $xfer += $output->writeBool($this->realtime_shared);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->status !== null) {
            $xfer += $output->writeFieldBegin('status', TType::I32, 100);
            $xfer += $output->writeI32($this->status);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->data_progress !== null) {
            $xfer += $output->writeFieldBegin('data_progress', TType::I32, 101);
            $xfer += $output->writeI32($this->data_progress);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->progress_percent !== null) {
            $xfer += $output->writeFieldBegin('progress_percent', TType::I32, 102);
            $xfer += $output->writeI32($this->progress_percent);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->rebuilding !== null) {
            $xfer += $output->writeFieldBegin('rebuilding', TType::BOOL, 103);
            $xfer += $output->writeBool($this->rebuilding);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->unread_error_count !== null) {
            $xfer += $output->writeFieldBegin('unread_error_count', TType::I32, 104);
            $xfer += $output->writeI32($this->unread_error_count);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->action_cause !== null) {
            $xfer += $output->writeFieldBegin('action_cause', TType::I32, 105);
            $xfer += $output->writeI32($this->action_cause);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}