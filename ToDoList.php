<?php


return [
    '0' => [
        'basics' => [
            'tablename' => 'Furniture',
        ],
        'fields' => [
            '0' => ['furnituretypes_id', 'ref', [
                'tablename' => 'Furnituretypes',
                'modelname' => 'Furnituretypes',
                'displayedfield' => 'name',
            ]],
            '1' => ['description', 'string', 'nullable'],
            '2' => ['land_number', 'string', 'nullable'],
            '3' => ['status', 'integer', 'notnull'],
            '4' => ['createdby', 'ref', [
                'tablename' => 'users',
                'modelname' => 'User',
                'displayedfield' => 'name',
            ]],
            '5' => ['updatedby', 'ref', [
                'tablename' => 'users',
                'modelname' => 'User',
                'displayedfield' => 'name',
            ]],
            '6' => ['published', 'checkbox'],
        ],
    ],
];
