<?php

/**
 * Here, the all methods of shortcode its defined
 *
 * @package    Feedsgram
 * @subpackage Feedsgram/admin
 * @author     José Luziarte <joseyesfox@gmail.com>
 */
class Feedsgram_Shortcode extends Feedsgram_Admin
{

    /**
     * This function register all feedsgram shortcode
     */
    public function fg_register_shortcodes()
    {

        //Save all shortcode data
        $data = array(
            'feedsgram_posts' => 'fg_sc_feedsgram_posts',
        );

        foreach ($data as $key => $value) {

            add_shortcode($key, array($this, $value));
        }
    }

    /**
     * A little shortcode
     * @return HTML with all posts of instagram
     */
    public function fg_sc_feedsgram_posts() {
        $profile = get_option( 'fg_url_profile' );
		$post_number = get_option( 'fg_post_number' );

        //Get the instance of posts
        $posts = new Instagram_Post( $profile );


        $feeds = $posts->get_feeds( $post_number );
        ?>
            <div class="fg-grid-insta">
            <?php foreach( $feeds as $value): ?>
                <div class="fg-insta-item">
                    <a href="<?php echo $value['url']; ?>" target="_blank">
                        <img src="<?php echo $value['img']; ?>" alt="" width="100%">
                    </a>
                </div>
            <?php endforeach; ?>
            </div>
        <?php
    }
}
