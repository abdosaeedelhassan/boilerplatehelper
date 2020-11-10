<?php


return [
//    '0' => [
//        'basics' => [
//            'tablename' => 'Furniture',
//        ],
//        'fields' => [
//            '0' => ['furnituretypes_id', 'ref', [
//                'tablename' => 'Furnituretypes',
//                'modelname' => 'Furnituretypes',
//                'displayedfield' => 'name',
//            ]],
//            '1' => ['description', 'string', 'nullable'],
//            '2' => ['land_number', 'string', 'nullable'],
//            '3' => ['status', 'integer', 'notnull'],
//            '4' => ['createdby', 'ref', [
//                'tablename' => 'users',
//                'modelname' => 'User',
//                'displayedfield' => 'name',
//            ]],
//            '5' => ['updatedby', 'ref', [
//                'tablename' => 'users',
//                'modelname' => 'User',
//                'displayedfield' => 'name',
//            ]],
//            '6' => ['published', 'checkbox'],
//        ],
//    ],

    '0' => [
        'basics' => [
            'tablename' => 'Conditions',
        ],
        'fields' => [
            '0' => ['type', 'integer', 'nullable'],
            '1' => ['text', 'string', 'nullable'],
            '2' => ['published', 'checkbox'],
        ],
    ],
    '1' => [
        'basics' => [
            'tablename' => 'Regions',
        ],
        'fields' => [
            '0' => ['name', 'string', 'notnull'],
            '1' => ['coordinates', 'string', 'nullable'],
            '2' => ['pricing', 'string', 'nullable'],
            '3' => ['published', 'checkbox'],
        ],
    ],
    '3' => [
        'basics' => [
            'tablename' => 'Questions',
        ],
        'fields' => [
            '0' => ['text', 'string', 'notnull'],
            '1' => ['published', 'checkbox'],
        ],
    ],
];
