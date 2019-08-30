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
    public function fg_sc_feedsgram_posts()
    {
        ?>
            <div class="fg-grid-insta">
                
                <div class="fg-insta-item">
                    <a href="https://instagram.com/p/B1wvV9ipwj_" target="_blank">
                        <img src="https://scontent-gig2-1.cdninstagram.com/vp/5eb0527b4b322bcfe587904f3e4e4c07/5DF18544/t51.2885-15/e35/67812251_744140009432436_8884713075066950905_n.jpg?_nc_ht=scontent-gig2-1.cdninstagram.com" alt="" width="100%">
                    </a>
                </div>

            </div>
        <?php
    }
}
