<?php


return [
    '0' => array(
        'basics' => array(
            'tablename' => 'Ewallet',
        ),
        'fields' => array(
            '0' => ['user', 'ref', array(
                'tablename' => 'users',
                'modelname' => 'User',
                'displayedfield' => 'full_name',
            )],
            '1' => ['operation', 'string', 'notnull'],
            '2' => ['balance', 'string', 'notnull'],
            '3' => ['shortdesc', 'string', 'notnull'],
            '4' => ['publish', 'checkbox'],
        ),
    ),
];
