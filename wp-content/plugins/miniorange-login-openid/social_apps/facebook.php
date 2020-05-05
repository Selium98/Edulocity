<?php

class facebook
{
    public $color="#3A5897";
    public $scope="email, public_profile";
    public $video_url="https://www.youtube.com/embed/1hsLaT54XYM";
    public $instructions;
    public function __construct() {
        $this->site_url = get_option( 'siteurl' );
        $this->instructions="Go to Facebook developers console <a href=\"https://developers.facebook.com/apps/\" target=\"_blank\">https://developers.facebook.com/apps/</a>. Login with your facebook developer account.##Click on Create a New App/Add new App button.##Enter <b>Display Name</b> and click on Create App ID.##Click on <b>Products</b> from left pane of the page and select <b>Facebook Login</b> and click on <b>Set Up</b> button.##Click on <b>Web</b>. Enter <b><code id='0'>".get_option("siteurl")."</code><i style= \"width: 11px;height: 9px;padding-left:2px;padding-top:3px\" class=\"mofa mofa-fw mofa-lg mofa-copy mo_copy mo_copytooltip\" onclick=\"copyToClipboard(this, '#0', '#shortcode_url_copy')\"><span id=\"shortcode_url_copy\" class=\"mo_copytooltiptext\">Copy to Clipboard</span></i></b> into <b>Site URL</b> than click on <b> Save</b>.##Goto <b>Settings -> Basic</b> from left pane of the page, Enter <b><code id='1'>".$_SERVER['HTTP_HOST']."</code><i style= \"width: 11px;height: 9px;padding-left:2px;padding-top:3px\" class=\"mofa mofa-fw mofa-lg mofa-copy mo_copy mo_copytooltip\" onclick=\"copyToClipboard(this, '#1', '#shortcode_url1_copy')\"><span id=\"shortcode_url1_copy\" class=\"mo_copytooltiptext\">Copy to Clipboard</span></i></b> in <b>App Domain</b>, your privacy policy URL in <b>Privacy Policy URL</b> and select <b>Category</b> of your website. Then click on <b>Save Changes</b>.##From the left pane, select <b>Facebook Login -> Settings</b>.##Under Client OAuth Settings section, Enter <b><code id='2'>".mo_get_permalink('facebook')."</code><i style= \"width: 11px;height: 9px;padding-left:2px;padding-top:3px\" class=\"mofa mofa-fw mofa-lg mofa-copy mo_copy mo_copytooltip\" onclick=\"copyToClipboard(this, '#2', '#shortcode_url2_copy')\"><span id=\"shortcode_url2_copy\" class=\"mo_copytooltiptext\">Copy to Clipboard</span></i></b> in <b>Valid OAuth Redirect URIs</b> and click on <b>Save Changes</b> button.##Change your app status from In Development to Live by clicking on OFF (sliding button) beside Status option of the top right corner. Then, click on Confirm button.##Go to Settings > Basic. Paste your <b>App ID</b> and <b>App Secret</b> provided by Facebook into the fields above.##Input <b> email, public_profile </b>as scope.##If you want to access the <b>user_birthday, user_hometown, user_location</b> of a Facebook user, you need to send your app for review to Facebook. For submitting an app for review, click <a target=\"_blank\" href=\"https://developers.facebook.com/docs/facebook-login/review/how-to-submit \">here</a>. After your app is reviewed, you can add the scopes you have sent for review in the scope above. If your app is not approved or is in the process of getting approved, let the scope be <b>email, public_profile</b>##Click on the <b>Save settings</b> button.##Go to Social Login tab to configure the display as well as other login settings.";
    }

    function mo_openid_get_app_code()
    {
        $appslist = maybe_unserialize(get_option('mo_openid_apps_list'));
        $social_app_redirect_uri= get_social_app_redirect_uri('facebook');
        mo_openid_start_session();
        $_SESSION["appname"] = 'facebook';
        $client_id = $appslist['facebook']['clientid'];
        $scope = $appslist['facebook']['scope'];
        $login_dialog_url = "https://www.facebook.com/v2.11/dialog/oauth?client_id=".$client_id. '&redirect_uri='. $social_app_redirect_uri .'&response_type=code&scope='.$scope;
        header('Location:'. $login_dialog_url);
        exit;
    }

    function mo_openid_get_access_token()
    {
        $code=mo_openid_validate_code();
        $social_app_redirect_uri = get_social_app_redirect_uri('facebook');

        $appslist = maybe_unserialize(get_option('mo_openid_apps_list'));
        $client_id = $appslist['facebook']['clientid'];
        $client_secret = $appslist['facebook']['clientsecret'];
        $access_token_uri = 'https://graph.facebook.com/v2.11/oauth/access_token';
        $postData = 'client_id=' . $client_id . '&redirect_uri=' . $social_app_redirect_uri . '&client_secret=' . $client_secret . '&code=' . $code;
        $access_token_json_output=mo_openid_get_access_token($postData,$access_token_uri,'facebook');
        $access_token = isset( $access_token_json_output['access_token']) ?  $access_token_json_output['access_token'] : '';
        mo_openid_start_session();
        $px = get_option('facebook_profile_pic_resolution')?get_option('facebook_profile_pic_resolution'):'180';
        $profile_url ='https://graph.facebook.com/me/?fields=age_range,birthday,about,cover,currency,devices,education,email,favorite_athletes,favorite_teams,first_name,gender,hometown,inspirational_people,interested_in,is_verified,languages,last_name,link,locale,location,meeting_for,middle_name,name,name_format,political,public_key,quotes,relationship_status,religion,sports,timezone,updated_time,verified,website,work,friends,picture.height('.$px.')&access_token='  .$access_token;
        $profile_json_output = mo_openid_get_social_app_data($access_token,$profile_url,'facebook');

        //Test Configuration
        if( is_user_logged_in() && get_option('mo_openid_test_configuration') == 1 )
        {
            mo_openid_app_test_config($profile_json_output);
        }
        //set all profile details
        //Set User current app
        $first_name = $last_name  = $email = $user_name  =  $user_url  = $user_picture  = $social_user_id = '';
        $location_city = $location_country = $about_me = $company_name = $age = $gender = $friend_nos = '';

        $first_name = isset( $profile_json_output['first_name']) ?  $profile_json_output['first_name'] : '';
        $last_name = isset( $profile_json_output['last_name']) ?  $profile_json_output['last_name'] : '';
        $email = isset( $profile_json_output['email']) ?  $profile_json_output['email'] : '';
        $user_name = isset( $profile_json_output['name']) ?  $profile_json_output['name'] : '';
        $user_url = isset( $profile_json_output['link']) ?  $profile_json_output['link'] : '';
        $user_picture = isset( $profile_json_output['picture']['data']['url']) ?  $profile_json_output['picture']['data']['url'] : '';
        $social_user_id = isset( $profile_json_output['id']) ?  $profile_json_output['id'] : '';
        $location_city =  isset( $profile_json_output['location']['name']) ?  $profile_json_output['location']['name'] : '';
        $location_country =  isset( $profile_json_output['location']['country']['code']) ?  $profile_json_output['location']['country']['code'] : '';
        $about_me = isset( $profile_json_output['summary']) ?  $profile_json_output['summary'] : '';
        $company_name  = isset( $profile_json_output['positions']['values']['0']['company']['name']) ?  $profile_json_output['positions']['values']['0']['company']['name'] : '';
        $friend_nos= isset( $profile_json_output['friends']['summary']['total_count']) ?  $profile_json_output['friends']['summary']['total_count'] : '';
        $gender = isset( $profile_json_output['gender']) ?  $profile_json_output['gender'] : '';
        $age= isset( $profile_json_output['age_range']['min']) ?  $profile_json_output['age_range']['min'] : '';

        $appuserdetails = array(
            'first_name'  =>  $first_name,
            'last_name'    =>  $last_name,
            'email'   =>  $email,
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