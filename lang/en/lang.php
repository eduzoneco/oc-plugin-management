<?php return [
    'plugin' => [
        'name' => 'management',
        'description' => ''
    ],
    'navigation' => [
        'parent' => 'E-learning',
        'coursecategory' => 'Course Category',
        'course' => 'Course',
        'lesson' => 'Lesson :)',

    ],
    'general' =>[
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
        'deleted_at' => 'Deleted at',
        'is_active'  => 'Is Active',
    ],
    'coursecategory' => [
        'form' => [
            'name'=> 'Name',
            'description'=> 'Description',

        ],
        'list' =>[
            'id' => 'Id',
            'name' => 'Name',
            'description' => 'Description'
        ]
    ],
    'lesson' => [
        'form' => [
            'id' => 'Id',
            'courseid'=> 'Course ID Lesson',
            'title'=> 'Title Lesson',
            'description'=> 'Description Lesson',
            'content'=> 'Content Lesson'
        ],
        'list' =>[
            'courseidl' => 'Course ID',
            'id' => 'Id',
            'title' => 'Title',
            'description' => 'Description',
            'contentl'=> 'Content'
        ]
    ]
];