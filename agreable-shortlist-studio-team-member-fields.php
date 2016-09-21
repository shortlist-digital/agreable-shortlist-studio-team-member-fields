<?php

/**
* @wordpress-plugin
* Plugin Name: Agreable Shortlist Studio Team Member Fields
* Plugin URI: http://github.com/shortlist-digital/agreable-shortlist-studio-team-member-fields
* Description: Add a team member widget to the post and page types on Shortlist Studio
* Version: 1.0.0
* Author: Jon Sherrard
* Author URI: http://twitter.com/jshez
* License: GPL2
*/


class AgreableShortlistStudioTeamMemberFields
{
    public function __construct()
    {
        add_filter('acf/rest_api/page/get_fields', array($this, 'add_acf_to_team_member'), 10, 3);
        add_filter('acf/rest_api/post/get_fields', array($this, 'add_acf_to_team_member'), 10, 3);
        add_filter('acf/rest_api/category/get_fields', array($this, 'add_acf_to_team_member'), 10, 3);
    }


    public function add_acf_to_team_member($data, $request, $response)
    {
        if ($response instanceof WP_REST_Response) {
            $data = $response->get_data();
        }

        if (isset($data['acf']['widgets'])) {
            foreach ($data['acf']['widgets'] as &$widget) {
                $userAcf = get_fields("user_{$widget['team_member']['ID']}");    // get fields from post
                $widget['acf'] = $userAcf;
            }
        }

        return $data;
    }
}

new AgreableShortlistStudioTeamMemberFields();
