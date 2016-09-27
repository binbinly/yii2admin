<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    
    /* redis key 前缀 */
    'redisKey' => 'school_cache_',
    /* redis key 标识 */
    'redisKeyPre' => [
        'school'      => 'school',          //哈希类型 以school_id为键值，存储一个学校的所有信息
        'member'      => 'member',          //哈希类型 以uid为键值，一个用户信息
        'rank_school' => 'rank_school',     //哈希类型 以school_id为键值，所有学校贡献排名
        'rank_user'   => 'rank_user',       //哈希类型 以school_id为键值，一学校的用户贡献排名
        'renk_user_top1' => 'renk_user_top1'//哈希类型 以school_id为键值，一学校贡献第一名的用户
    ],
    /* redis key 生存时间 600秒 */
    'redisExpires' => 600,

    /* 上传文件 */
    'upload' => [
        'url'  => '/upload/image/',
        'path' => realpath(__DIR__ . '/../../web/upload/image/').'/',
    ],

    /* 支付状态 */
    'pay_status' => [
        0 => '未支付',
        1 => '已支付'
    ],
    /* 支付类型 */
    'pay_type' => [
        1 => '微信',
        2 => '支付宝',
        3 => '银联',
        4 => '后台'
    ],
    /* 支付途径 */
    'pay_source' => [
        1 => '网站',
        2 => '微信',
        3 => '后台',
    ],

    /* 订单类型 */
    'order_type' => [
        'shop' => '产品',
        'train' => '培训'
    ]
    
];
