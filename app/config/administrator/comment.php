<?php
return array(
/**
 * Model title
 *
 * @type string
 */
    'title' => 'Comments',
/**
 * The singular name of your model
 *
 * @type string
 */
'single' => 'Comment',
/**
 * The class name of the Eloquent model that this config represents
 *
 * @type string
 */
'model' => 'Comment',
/**
 * The columns array
 *
 * @type array
 */
'columns' => array(
    'commenter' => array(
        'title' => 'Commenter'
    ),
    'comment'   => array(
        'title' => 'Comment'
    ),
    'email'     => array(
        'title' => 'Email'
    ),
    'post_id'   => array(
        'title' => 'Post_id'
    )
    ),
/**
 * The edit fields array
 *
 * @type array
 */
'edit_fields' => array(
    'commenter' => array(
        'title' => 'Commenter',
        'type' => 'text'
    ),
    'comment' => array(
        'title' => 'Comment',
        'type' => 'text'
    ),
    'email' => array(
        'title' => 'Email',
        'type' => 'text'
    ),
    'post_id' => array(
        'title' => 'Post_id',
        'type' => 'text'
    )
),
);
