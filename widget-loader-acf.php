<?php

$widget_config = array(
    'key' => 'widget_team_member',
    // The 'name' will define the directory that the parent theme looks
    // for our plugin template in. e.g. views/widgets/promo_plugin/template.twig.
    'name' => 'team_member',
    'label' => 'Team Member',
    'display' => 'block',
    'sub_fields' => array(
        array(
            'key' => 'team_member_basic_details_tab',
            'label' => 'Basic Details',
            'type' => 'tab',
            'placement' => 'left',
        ),
        array(
          'key' => 'team_member_team_member',
          'label' => 'Team Member',
          'name' => 'team_member',
          'type' => 'user',
        ),
        array(
            'key' => 'team_member_advanced_details_tab',
            'label' => 'Advanced Details',
            'name'=> 'advanced_details',
            'type' => 'tab',
            'placement' => 'left',
        ),
    ),
);


$widget_config['content-types'] = array('post', 'page'); // section, article
$widget_config['content-sizes'] = array('main');
