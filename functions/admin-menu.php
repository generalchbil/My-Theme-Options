<?php

if (is_admin()) {
    add_action('admin_menu', 'create_theme_options_page');

    function create_theme_options_page() {
        add_options_page('Theme Options', 'theme options', 'administrator','options-theme', 'build_options_page');
    }

    function build_options_page() { ?>

        <div id="theme-options-wrap" class="widefat">
            <div class="icon32" id="icon-tools">
                <br />
            </div>
            <h1>My Theme Options</h1>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php settings_fields('plugin_options'); ?>  <?php do_settings_sections('options-theme'); ?>
                <p class="submit">
                    <input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
                </p>
            </form>
        </div>
    <?php
    }
    add_action('admin_init', 'register_and_build_fields');
    function register_and_build_fields() {
        register_setting('plugin_options', 'plugin_options', 'validate_setting');

        // add Sections
        add_settings_section('footer_section', 'Footer Settings', 'section_cb','options-theme');
        add_settings_section('cookie_section', 'Cookie Settings', 'section_cb','options-theme');
        add_settings_section('social_section', 'Social Settings', 'section_cb','options-theme');
        add_settings_section('maps_section', 'Map Settings', 'section_cb','options-theme');
        add_settings_section('newsletter_section', 'Newsletter Settings', 'section_cb','options-theme');
        add_settings_section('contact_clients_section', 'Contact Clients Settings', 'section_cb','options-theme');
        add_settings_section('contact_investors_section', 'Contact Investors Settings', 'section_cb','options-theme');
        add_settings_section('contact_talents_section', 'Contact Talents Settings', 'section_cb','options-theme');

        //add fields Footer
        add_settings_field('mention_legal_link', 'Mention Légal Link', 'mention_legal_link_setting', 'options-theme', 'footer_section');

        //add fields Cookie
        add_settings_field('cookie_link', 'Cookie Link', 'cookie_link_setting', 'options-theme', 'cookie_section');

        // add fields Social
        add_settings_field('facebook_url', 'Facebook Link', 'facebook_url_setting', 'options-theme', 'social_section');
        add_settings_field('twitter_url', 'Twitter Link', 'twitter_url_setting', 'options-theme', 'social_section');
        add_settings_field('instagram_url', 'Instagram Link', 'instagram_url_setting', 'options-theme', 'social_section');
        add_settings_field('youtube_url', 'Youtube Link', 'youtube_url_setting', 'options-theme', 'social_section');

        // add fields Map
        add_settings_field('title_maps', 'Titre Maps :', 'title_maps_setting', 'options-theme', 'maps_section');
        add_settings_field('nb_villages_maps', 'Nombre Villages :', 'nb_villages_maps_setting', 'options-theme', 'maps_section');
        add_settings_field('nb_agencies_maps', 'Nombre Agences :', 'nb_agencies_maps_setting', 'options-theme', 'maps_section');
        add_settings_field('nb_employes_maps', 'Nombre Employés :', 'nb_employes_maps_setting', 'options-theme', 'maps_section');
        add_settings_field('key_google_maps', 'Key Google Maps :', 'key_google_maps_setting', 'options-theme', 'maps_section');

        // add fields Newsletter
        add_settings_field('newsletter_title', 'Newsletter Title :', 'newsletter_title_setting', 'options-theme', 'newsletter_section');
        add_settings_field('newsletter_description', 'Newsletter Description :', 'newsletter_description_setting', 'options-theme', 'newsletter_section');
        add_settings_field('newsletter_error_messages', 'Newsletter Messages Erreur :', 'newsletter_error_messages_setting', 'options-theme', 'newsletter_section');


        // add fields Contact Client
        add_settings_field('contact_clients_libelle', 'Contact Clients libelle :', 'contact_clients_libelle_setting', 'options-theme', 'contact_clients_section');
        add_settings_field('contact_clients_text', 'Contact Clients Text :', 'contact_clients_text_setting', 'options-theme', 'contact_clients_section');
        add_settings_field('contact_clients_linkedin', 'Contact Clients Linkedin :', 'contact_clients_linkedin_setting', 'options-theme', 'contact_clients_section');
        add_settings_field('contact_clients_photo', 'Contact Clients Photo :', 'contact_clients_photo_setting', 'options-theme', 'contact_clients_section');
        add_settings_field('contact_clients_profile_icon', 'Contact Clients Profile Icon :', 'contact_clients_profile_icon_setting', 'options-theme', 'contact_clients_section');
        add_settings_field('contact_clients_email', 'Contact Clients Email :', 'contact_clients_email_setting', 'options-theme', 'contact_clients_section');
        // add fields Contact Investors
        add_settings_field('contact_investors_libelle', 'Contact Investors libelle :', 'contact_investors_libelle_setting', 'options-theme', 'contact_investors_section');
        add_settings_field('contact_investors_text', 'Contact Investors Text :', 'contact_investors_text_setting', 'options-theme', 'contact_investors_section');
        add_settings_field('contact_investors_linkedin', 'Contact Investors Linkedin :', 'contact_investors_linkedin_setting', 'options-theme', 'contact_investors_section');
        add_settings_field('contact_investors_photo', 'Contact Investors Photo :', 'contact_investors_photo_setting', 'options-theme', 'contact_investors_section');
        add_settings_field('contact_investors_profile_icon', 'Contact Investors Profile Icon :', 'contact_investors_profile_icon_setting', 'options-theme', 'contact_investors_section');
        add_settings_field('contact_investors_email', 'Contact Investors Email :', 'contact_investors_email_setting', 'options-theme', 'contact_investors_section');

        // add fields Contact Talents
        add_settings_field('contact_talents_libelle', 'Contact Talents libelle :', 'contact_talents_libelle_setting', 'options-theme', 'contact_talents_section');
        add_settings_field('contact_talents_text', 'Contact Talents Text :', 'contact_talents_text_setting', 'options-theme', 'contact_talents_section');
        add_settings_field('contact_talents_linkedin', 'Contact Talents Linkedin :', 'contact_talents_linkedin_setting', 'options-theme', 'contact_talents_section');
        add_settings_field('contact_talents_photo', 'Contact Talents Photo :', 'contact_talents_photo_setting', 'options-theme', 'contact_talents_section');
        add_settings_field('contact_talents_profile_icon', 'Contact Talents Profile Icon :', 'contact_talents_profile_icon_setting', 'options-theme', 'contact_talents_section');
        add_settings_field('contact_talents_email', 'Contact Talents Email :', 'contact_talents_email_setting', 'options-theme', 'contact_talents_section');


    }

    function validate_setting($plugin_options) {
        return $plugin_options;
    }

    function section_cb() {
    }


    // Mention legal link
    function mention_legal_link_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[fr][mention_legal_link]' type='url' value='{$options['fr']['mention_legal_link']}' />";
        echo "<input name='plugin_options[en][mention_legal_link]' type='url' value='{$options['en']['mention_legal_link']}' />";
    }

    // Cookie link
    function cookie_link_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[fr][cookie_link]' type='url' value='{$options['fr']['cookie_link']}' />";
        echo "<input name='plugin_options[en][cookie_link]' type='url' value='{$options['en']['cookie_link']}' />";
    }

    //facebook_url
    function facebook_url_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[facebook_url]' type='url' value='{$options['facebook_url']}' />";
    }
    //twitter_url
    function twitter_url_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[twitter_url]' type='url' value='{$options['twitter_url']}' />";
    }
    //instagram_url
    function instagram_url_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[instagram_url]' type='url' value='{$options['instagram_url']}' />";
    }

    //youtube_url
    function youtube_url_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[youtube_url]' type='url' value='{$options['youtube_url']}' />";
    }

    // title_maps
    function title_maps_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[fr][title_maps]' type='text' value='{$options['fr']['title_maps']}' />";
        echo "<input name='plugin_options[en][title_maps]' type='text' value='{$options['en']['title_maps']}' />";
    }

    // nb_villages_maps
    function nb_villages_maps_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[nb_villages_maps]' type='number' value='{$options['nb_villages_maps']}' />";
    }

    // nb_agencies_maps
    function nb_agencies_maps_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[nb_agencies_maps]' type='number' value='{$options['nb_agencies_maps']}' />";
    }

    // nb_employes_maps
    function nb_employes_maps_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[nb_employes_maps]' type='number' value='{$options['nb_employes_maps']}' />";
    }

    // Key Google Maps
    function key_google_maps_setting(){
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[key_google_maps]' type='text' value='{$options['key_google_maps']}' />";
    }
    // newsletter_title
    function newsletter_title_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[fr][newsletter_title]' type='text' value='{$options['fr']['newsletter_title']}' />";
        echo "<input name='plugin_options[en][newsletter_title]' type='text' value='{$options['en']['newsletter_title']}' />";
    }
    // newsletter_description
    function newsletter_description_setting() {
        $options = get_option('plugin_options');
        echo "<textarea name='plugin_options[fr][newsletter_description]' />{$options['fr']['newsletter_description']}</textarea>";
        echo "<textarea name='plugin_options[en][newsletter_description]' />{$options['en']['newsletter_description']}</textarea>";
    }
    // newsletter_error_messages
    function newsletter_error_messages_setting(){
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[fr][newsletter_error_messages]' type='text' value='{$options['fr']['newsletter_error_messages']}' />";
        echo "<input name='plugin_options[en][newsletter_error_messages]' type='text' value='{$options['en']['newsletter_error_messages']}' />";
    }


                                                            /************************ Contact Client ****************/
    function contact_clients_libelle_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[clients][fr][contact_libelle]' type='text' value='{$options['clients']['fr']['contact_libelle']}' />";
        echo "<input name='plugin_options[clients][en][contact_libelle]' type='text' value='{$options['clients']['en']['contact_libelle']}' />";
    }

    // contact_clients_text
    function contact_clients_text_setting() {
        $options = get_option('plugin_options');
        echo "<textarea  name='plugin_options[clients][fr][contact_text]' /> {$options['clients']['fr']['contact_text']}</textarea>";
        echo "<textarea name='plugin_options[clients][en][contact_text]'/>{$options['clients']['en']['contact_text']}</textarea>";

    }

    // contact_clients_photo
    function contact_clients_photo_setting()
    {
        $options = get_option('plugin_options'); ?>
        <div>
            <input type="text" id="contact_clients_photo" name="plugin_options[clients][contact_photo]" value="<?php echo esc_url( $options['clients']['contact_photo'] ); ?>" class="regular-text">
            <input type="button"  name="upload-btn" id="upload-btn-client" class="button-secondary" value="Upload Image">
            <span class="description">Uploading an image</span>
        </div>

    <?php }
    // contact_clients_profile_icon
    function contact_clients_profile_icon_setting()
    {
        $options = get_option('plugin_options'); ?>
        <div>
            <input type="text" id="contact_clients_profile_icon" name="plugin_options[clients][contact_profile_icon]" value="<?php echo esc_url( $options['clients']['contact_profile_icon'] ); ?>" class="regular-text">
            <input type="button"  name="upload-btn" id="upload-btn-client-profile" class="button-secondary" value="Upload Image">
            <span class="description">Uploading an image</span>
        </div>

    <?php }
    //contact_clients_linkedin
    function contact_clients_linkedin_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[clients][contact_linkedin]' type='url' value='{$options['clients']['contact_linkedin']}' />";
    }
    //contact_clients_email
    function contact_clients_email_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[clients][contact_email]' type='email' value='{$options['clients']['contact_email']}' />";
    }


                                                            /************************ Contact Investors ****************/
    function contact_investors_libelle_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[investors][fr][contact_libelle]' type='text' value='{$options['investors']['fr']['contact_libelle']}' />";
        echo "<input name='plugin_options[investors][en][contact_libelle]' type='text' value='{$options['investors']['en']['contact_libelle']}' />";
    }

    // contact_investors_text
    function contact_investors_text_setting() {
        $options = get_option('plugin_options');
        echo "<textarea name='plugin_options[investors][fr][contact_text]' />{$options['investors']['fr']['contact_text']}</textarea>";
        echo "<textarea name='plugin_options[investors][en][contact_text]' />{$options['investors']['en']['contact_text']}</textarea>";
    }
    // contact_investors_photo
    function contact_investors_photo_setting()
    {
        $options = get_option('plugin_options'); ?>
        <div>
            <input type="text" id="contact_investors_photo" name="plugin_options[investors][contact_photo]" value="<?php echo esc_url( $options['investors']['contact_photo'] ); ?>" class="regular-text">
            <input type="button"  name="upload-btn" id="upload-btn-investors" class="button-secondary" value="Upload Image">
            <span class="description">Uploading an image</span>
        </div>
    <?php }
    // contact_investors_profile_icon
    function contact_investors_profile_icon_setting()
    {
        $options = get_option('plugin_options'); ?>
        <div>
            <input type="text" id="contact_investors_profile_icon" name="plugin_options[investors][contact_profile_icon]" value="<?php echo esc_url( $options['investors']['contact_profile_icon'] ); ?>" class="regular-text">
            <input type="button"  name="upload-btn" id="upload-btn-investors-profile" class="button-secondary" value="Upload Image">
            <span class="description">Uploading an image</span>
        </div>

    <?php }
    //contact_investors_linkedin
    function contact_investors_linkedin_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[investors][fr][contact_linkedin]' type='url' value='{$options['investors']['fr']['contact_linkedin']}' />";
    }
    //contact_investors_email
    function contact_investors_email_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[investors][contact_email]' type='email' value='{$options['investors']['contact_email']}' />";
    }


                                                            /************************ Contact Talents ****************/

    function contact_talents_libelle_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[talents][fr][contact_libelle]' type='text' value='{$options['talents']['fr']['contact_libelle']}' />";
        echo "<input name='plugin_options[talents][en][contact_libelle]' type='text' value='{$options['talents']['en']['contact_libelle']}' />";
    }
    // contact_talents_text
    function contact_talents_text_setting() {
        $options = get_option('plugin_options');
        echo "<textarea name='plugin_options[talents][fr][contact_text]' />{$options['talents']['fr']['contact_text']}</textarea>";
        echo "<textarea name='plugin_options[talents][en][contact_text]' />{$options['talents']['en']['contact_text']}</textarea>";
    }
    // contact_talents_photo
    function contact_talents_photo_setting()
    {
        $options = get_option('plugin_options');?>
        <div>
            <input type="text" id="contact_talents_photo" name="plugin_options[talents][contact_photo]" value="<?php echo esc_url( $options['talents']['contact_photo'] ); ?>" class="regular-text">
            <input type="button"  name="upload-btn" id="upload-btn-talents" class="button-secondary" value="Upload Image">
            <span class="description">Uploading an image</span>
        </div>

    <?php }
    // contact_talents_profile_icon
    function contact_talents_profile_icon_setting()
    {
        $options = get_option('plugin_options'); ?>
        <div>
            <input type="text" id="contact_talents_profile_icon" name="plugin_options[talents][contact_profile_icon]" value="<?php echo esc_url( $options['talents']['contact_profile_icon'] ); ?>" class="regular-text">
            <input type="button"  name="upload-btn" id="upload-btn-talents-profile" class="button-secondary" value="Upload Image">
            <span class="description">Uploading an image</span>
        </div>

    <?php }
    //contact_investors_linkedin
    function contact_talents_linkedin_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[talents][contact_linkedin]' type='url' value='{$options['talents']['contact_linkedin']}' />";
    }
    //contact_talents_email
    function contact_talents_email_setting() {
        $options = get_option('plugin_options');
        echo "<input name='plugin_options[talents][contact_email]' type='email' value='{$options['talents']['contact_email']}' />";
    }

    // Add stylesheet
    add_action('admin_head', 'admin_register_head');
    function admin_register_head() {
        $url = get_bloginfo('template_directory') . '/functions/options_page.css';
	    $relativeurl = wp_make_link_relative($url);
        echo "<link rel='stylesheet' href='$relativeurl' />n";
    }
    // jQuery
    wp_enqueue_script('jquery');
    // This will enqueue the Media Uploader script
    wp_enqueue_media();
    // And let's not forget the script we wrote earlier
    wp_enqueue_script('script', wp_make_link_relative(get_bloginfo('template_directory') . '/functions/custom-script.js'));
}