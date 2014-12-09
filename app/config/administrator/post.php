<?php
return array(
/**
 * Model title
 *
 * @type string
 */
    'title' => 'Posts',
/**
 * The singular name of your model
 *
 * @type string
 */
'single' => 'Post',
/**
 * The class name of the Eloquent model that this config represents
 *
 * @type string
 */
'model' => 'Post',
/**
 * The columns array
 *
 * @type array
 */
'columns' => array(
    'title' => array(
        'title' => 'title'
    ),
    'read_more'   => array(
        'title' => 'read_more'
    ),
    'content'     => array(
        'title' => 'content'
    ),
    'comment_count'   => array(
        'title' => 'comment_count'
    )
    ),
/**
 * The edit fields array
 *
 * @type array
 */
'edit_fields' => array(
    'title' => array(
        'title' => 'title',
        'type' => 'text'
    ),
    'read_more' => array(
        'title' => 'read_more',
        'type' => 'text'
    ),
    'content' => array(
        'title' => 'content',
        'type' => 'text'
    ),
    'comment_count' => array(
        'title' => 'comment_count',
        'type' => 'text'
    )
),
);
