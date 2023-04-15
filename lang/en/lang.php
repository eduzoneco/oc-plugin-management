<?php return [
    'plugin' => [
        'name' => 'management',
        'description' => ''
    ],
    'navigation' => [
        'parent' => 'E-learning',
        'coursecategory' => 'Course Category',
        'lesson' => 'Lesson :)',
        'activity' => 'Activity',
        'course' => 'Course'
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
    'activity' => [
        'form' => [
            'lesson_label'=> 'Lesson Title',
            'lesson_placeholder'=> 'Select Title',
            'type'=> 'Type',
            'title'=> 'Title',
            'type_placeholder'=> 'Select type',
            'description'=> 'Description',
            'difficulty'=> 'Difficulty',
            'estimated_duration'=> 'Estimated Duration',
            'is_active'=> 'Is Active'

        ],
        'list' =>[
            'id'=> 'Id',
            'lesson_id'=> 'Lesson',
            'type'=> 'Type',
            'title'=> 'Title',
            'description'=> 'Description',
            'difficulty'=> 'Difficulty',
            'estimated_duration'=> 'Estimated Duration',
            'is_active'=> 'Is Active'
        ]
    ],
    'lesson' => [
        'form' => [
            'id' => 'Id',
            'title'=> 'Title Lesson',
            'description'=> 'Description Lesson',
            'content'=> 'Content Lesson',
            'course_label'=> 'Course',
            'course_placeholder'=> 'select a course!!'
        ],
        'list' =>[
            'courseid' => 'Course ID',
            'id' => 'Id',
            'title' => 'Title',
            'description' => 'Description',
            'content'=> 'Content'
        ]
    ]

];