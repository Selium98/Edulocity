<?php


class google
{
    public $color="#DD4B39";
    public $scope="email+profile";
    public $video_url="https://www.youtube.com/embed/q7nK1lp7yqc";
    public $instructions;
    public function __construct() {
        $this->site_url = get_option( 'siteurl' );
        $this->instructions="Visit the Google website for developers <a href=\"https://console.developers.google.com/project/\" target=\"_blank\">console.developers.google.com</a>.##From the project drop-down, choose <b>Create a new project</b>, enter a name for the project, and optionally, edit the provided Project ID. Click <b>Create</b>.##Click Navigation menu in the left-upper corner and go to <b>APIs & Services</b> -> <b>Credentials</b>##On the Credentials page, select <b>Create credentials</b>, then select <b>OAuth client ID</b>.##You may be prompted to set a product name on the Consent screen. If so, click <b>Configure consent screen</b>, supply the requested information, and click Save to return to the Credentials screen.##Select <b>Web Application</b> for the Application Type. Follow the instructions to enter JavaScript origins, redirect URIs, or both. provide <b><code id='3'>".mo_get_permalink('google')."</code><i style= \"width: 11px;height: 9px;padding-left:2px;padding-top:3px\" class=\"mofa mofa-fw mofa-lg mofa-copy mo_copy mo_copytooltip\" onclick=\"copyToClipboard(this, '#3', '#shortcode_url_copy')\"><span id=\"shortcode_url_copy\" class=\"mo_copytooltiptext\">Copy to Clipboard</span></i></b> for the Redirect URI.##Click <b>Create</b>.##On the page that appears, copy the <b>client ID</b> and <b>client secret</b> to your clipboard, as you will need them to configure above.##Enable the <b>Google+ API</b>. In the Dashboard menu, click on <b>ENABLE APIS AND SERVICES</b>.##Type Google+ in search box, select Google+ API and click on <b>Enable</b>. </b>##Go to Social Login tab and configure the icons.";
    }

    function mo_openid_get_app_code()
    {
        $appslist = maybe_unserialize(get_option('mo_openid_apps_list'));
        $social_app_redirect_uri= get_social_app_redirect_uri('google');
        mo_openid_start_session();
        $_SESSION["appname"] = 'google';
        $client_id = $appslist['google']['clientid'];
        $scope = $appslist['google']['scope'];
        $login_dialog_url = 'https://accounts.google.com/o/oauth2/auth?redirect_uri=' .$social_app_redirect_uri .'&response_type=code&client_id=' .$client_id .'&scope='.$scope.'&access_type=offline';
        header('Location:'. $login_dialog_url);
        exit;
    }

    function mo_openid_get_access_token()
    {
        $code = mo_openid_validate_code();
        $social_app_redirect_uri = get_social_app_redirect_uri('google');

        $appslist = maybe_unserialize(get_option('mo_openid_apps_list'));
        $client_id = $appslist['google']['clientid'];
        $client_secret = $appslist['google']['clientsecret'];
        $access_token_uri = 'https://accounts.google.com/o/oauth2/token';
        $postData = 'code=' .$code .'&client_id=' .$client_id .'&client_secret=' . $client_secret . '&redirect_uri=' . $social_app_redirect_uri . '&grant_type=authorization_code';
        $access_token_json_output = mo_openid_get_access_token($postData, $access_token_uri,'google');
        $access_token = isset($access_token_json_output['access_token']) ? $access_token_json_output['access_token'] : '';
        mo_openid_start_session();
        $profile_url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token='  .$access_token;
        $profile_json_output = mo_openid_get_social_app_data($access_token, $profile_url, 'google');

        //Test Configuration
        if (is_user_logged_in() && get_option('mo_openid_test_configuration') == 1) {
            mo_openid_app_test_config($profile_json_output);
        }
        //set all profile details
        //Set User current app
        $first_name = $last_name = $email = $user_name = $user_url = $user_picture = $social_user_id = '';
        $location_city = $location_country = $about_me = $company_name = $age = $gender = $friend_nos = '';

        $first_name = isset( $profile_json_output['given_name']) ?  $profile_json_output['given_name'] : '';
        $user_name = isset( $profile_json_output['name']) ?  $profile_json_output['name'] : '';
        $last_name = isset( $profile_json_output['family_name']) ?  $profile_json_output['family_name'] : '';
        $email = isset( $profile_json_output['email']) ?  $profile_json_output['email'] : '';
        $user_url = isset( $profile_json_output['link']) ?  $profile_json_output['link'] : '';
        $user_picture = isset( $profile_json_output['picture']) ?  $profile_json_output['picture'] : '';
        $social_user_id = isset( $profile_json_output['id']) ?  $profile_json_output['id'] : '';

        $appuserdetails = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'user_name' => $user_name,
            'user_url' => $user_url,
            'user_picture' => $user_picture,
            'social_user_id' => $social_user_id,
            'location_city' => $location_city,
            'location_country' => $location_country,
            'about_me' => $about_me,
            'company_name' => $company_name,
            'friend_nos' => $friend_nos,
            'gender' => $gender,
            'age' => $age,
        );
        return $appuserdetails;
    }
}
