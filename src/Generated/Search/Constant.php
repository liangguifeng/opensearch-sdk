<?php

declare(strict_types=1);

namespace OpenSearch\Generated\Search;

use OpenSearch\Thrift\Type\TConstant;

final class Constant extends TConstant
{
    protected static $CONFIG_CLAUSE_START;

    protected static $CONFIG_CLAUSE_HIT;

    protected static $CONFIG_CLAUSE_RERANK_SIZE;

    protected static $CONFIG_CLAUSE_FORMAT;

    protected static $SORT_CLAUSE_INCREASE;

    protected static $SORT_CLAUSE_DECREASE;

    protected static $SORT_CLAUSE_RANK;

    protected static $DISTINCT_CLAUSE_DIST_KEY;

    protected static $DISTINCT_CLAUSE_DIST_COUNT;

    protected static $DISTINCT_CLAUSE_DIST_TIMES;

    protected static $DISTINCT_CLAUSE_RESERVED;

    protected static $DISTINCT_CLAUSE_DIST_FILTER;

    protected static $DISTINCT_CLAUSE_UPDATE_TOTAL_HIT;

    protected static $DISTINCT_CLAUSE_GRADE;

    protected static $AGGREGATE_CLAUSE_GROUP_KEY;

    protected static $AGGREGATE_CLAUSE_AGG_FUN;

    protected static $AGGREGATE_CLAUSE_RANGE;

    protected static $AGGREGATE_CLAUSE_MAX_GROUP;

    protected static $AGGREGATE_CLAUSE_AGG_FILTER;

    protected static $AGGREGATE_CLAUSE_AGG_SAMPLER_THRESHOLD;

    protected static $AGGREGATE_CLAUSE_AGG_SAMPLER_STEP;

    protected static $SUMMARY_PARAM_SUMMARY_FIELD;

    protected static $SUMMARY_PARAM_SUMMARY_LEN;

    protected static $SUMMARY_PARAM_SUMMARY_ELLIPSIS;

    protected static $SUMMARY_PARAM_SUMMARY_SNIPPET;

    protected static $SUMMARY_PARAM_SUMMARY_ELEMENT;

    protected static $SUMMARY_PARAM_SUMMARY_ELEMENT_PREFIX;

    protected static $SUMMARY_PARAM_SUMMARY_ELEMENT_POSTFIX;

    protected static $FORMAT_PARAM;

    protected static $ABTEST_PARAM_SCENE_TAG;

    protected static $ABTEST_PARAM_FLOW_DIVIDER;

    protected static $USER_ID;

    protected static $RAW_QUERY;

    protected static function init_CONFIG_CLAUSE_START()
    {
        return 'start';
    }

    protected static function init_CONFIG_CLAUSE_HIT()
    {
        return 'hit';
    }

    protected static function init_CONFIG_CLAUSE_RERANK_SIZE()
    {
        return 'rerank_size';
    }

    protected static function init_CONFIG_CLAUSE_FORMAT()
    {
        return 'format';
    }

    protected static function init_SORT_CLAUSE_INCREASE()
    {
        return '+';
    }

    protected static function init_SORT_CLAUSE_DECREASE()
    {
        return '-';
    }

    protected static function init_SORT_CLAUSE_RANK()
    {
        return 'RANK';
    }

    protected static function init_DISTINCT_CLAUSE_DIST_KEY()
    {
        return 'dist_key';
    }

    protected static function init_DISTINCT_CLAUSE_DIST_COUNT()
    {
        return 'dist_count';
    }

    protected static function init_DISTINCT_CLAUSE_DIST_TIMES()
    {
        return 'dist_times';
    }

    protected static function init_DISTINCT_CLAUSE_RESERVED()
    {
        return 'reserved';
    }

    protected static function init_DISTINCT_CLAUSE_DIST_FILTER()
    {
        return 'dist_filter';
    }

    protected static function init_DISTINCT_CLAUSE_UPDATE_TOTAL_HIT()
    {
        return 'update_total_hit';
    }

    protected static function init_DISTINCT_CLAUSE_GRADE()
    {
        return 'grade';
    }

    protected static function init_AGGREGATE_CLAUSE_GROUP_KEY()
    {
        return 'group_key';
    }

    protected static function init_AGGREGATE_CLAUSE_AGG_FUN()
    {
        return 'agg_fun';
    }

    protected static function init_AGGREGATE_CLAUSE_RANGE()
    {
        return 'range';
    }

    protected static function init_AGGREGATE_CLAUSE_MAX_GROUP()
    {
        return 'max_group';
    }

    protected static function init_AGGREGATE_CLAUSE_AGG_FILTER()
    {
        return 'agg_filter';
    }

    protected static function init_AGGREGATE_CLAUSE_AGG_SAMPLER_THRESHOLD()
    {
        return 'agg_sampler_threshold';
    }

    protected static function init_AGGREGATE_CLAUSE_AGG_SAMPLER_STEP()
    {
        return 'agg_sampler_step';
    }

    protected static function init_SUMMARY_PARAM_SUMMARY_FIELD()
    {
        return 'summary_field';
    }

    protected static function init_SUMMARY_PARAM_SUMMARY_LEN()
    {
        return 'summary_len';
    }

    protected static function init_SUMMARY_PARAM_SUMMARY_ELLIPSIS()
    {
        return 'summary_ellipsis';
    }

    protected static function init_SUMMARY_PARAM_SUMMARY_SNIPPET()
    {
        return 'summary_snippet';
    }

    protected static function init_SUMMARY_PARAM_SUMMARY_ELEMENT()
    {
        return 'summary_element';
    }

    protected static function init_SUMMARY_PARAM_SUMMARY_ELEMENT_PREFIX()
    {
        return 'summary_element_prefix';
    }

    protected static function init_SUMMARY_PARAM_SUMMARY_ELEMENT_POSTFIX()
    {
        return 'summary_element_postfix';
    }

    protected static function init_FORMAT_PARAM()
    {
        return 'format';
    }

    protected static function init_ABTEST_PARAM_SCENE_TAG()
    {
        return 'scene_tag';
    }

    protected static function init_ABTEST_PARAM_FLOW_DIVIDER()
    {
        return 'flow_divider';
    }

    protected static function init_USER_ID()
    {
        return 'user_id';
    }

    protected static function init_RAW_QUERY()
    {
        return 'raw_query';
    }
}
