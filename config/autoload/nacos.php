<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Hyperf\Nacos\Constants;

return [
    'enable' => env('nacos.enable', false),
    // nacos server url like https://nacos.hyperf.io, Priority is higher than host:port
    'url' => (string)env('nacos.host', '').':'.(string)env('nacos.port', 8848),
    // The nacos host info
    'host' => env('nacos.host', ''),
    'port' => env('nacos.port', 8848),
    // The nacos account info
    'username' => env('nacos.username', null),
    'password' => env('nacos.password', null),
    'config_merge_mode' => Constants::CONFIG_MERGE_OVERWRITE,
    // The service info.
    'service' => [
        'service_name' => env('nacos.service_name', ''),
        'group_name' => env('nacos.group_name', ''),
        'namespace_id' => env('nacos.namespace_id', ''),
        'protect_threshold' => 0.5,
    ],
    // The client info.
    'client' => [
        'service_name' => env('nacos.service_name', ''),
        'group_name' => env('nacos.group_name', ''),
        'weight' => 80,
        'cluster' => 'DEFAULT',
        'ephemeral' => true,
        'beat_enable' => true,
        'beat_interval' => 5,
        'namespace_id' => env('nacos.namespace_id', ''), // It must be equal with service.namespaceId.
    ],
    'remove_node_when_server_shutdown' => true,
    'config_reload_interval' => 3,
    'config_append_node' => 'nacos_config',
    'listener_config' => [
        // dataId, group, tenant, type, content
//        [
//           'tenant' => env('nacos.namespace_id', ''), // corresponding with service.namespaceId
//           'data_id' => env('nacos.listener.data_id', ''),
//           'group' => env('nacos.listener.group', ''),
//           'type' => env('nacos.listener.type', ''),
//        ],
        //[
        //    'data_id' => 'hyperf-service-config-yml',
        //    'group' => 'DEFAULT_GROUP',
        //    'type' => 'yml',
        //],
    ],
    'load_balancer' => 'random',
];
