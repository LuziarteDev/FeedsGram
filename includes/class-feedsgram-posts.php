<?php
    /**
     * @param String Profile do instagram é necessário para reproduzir o ultimo feed.
     * @return String Retorna o ID do ultimo post sendo necessário renderizar/incorporar um embed no instagram
     */
class Instagram_Post
{
    protected $profile;
    
    function __construct( $url ) {
        $this->profile = $this->parse_url( $url );
    }

    //This function parse and retrieve the url or profile
    private function parse_url( $url ) {
        if( strpos($url, 'instagram' )){
            return explode('/', $url, -1)[3];
        }else{
            return $url;
        }
    }

    /**
     * Pega os feeds e trata somente o ultimo post!
     */
    public function get_feeds( $number_post = 3 ){
        try{

            if( $number_post == 0 ) return 'invalid post';
            if( $number_post == 11 ) return 'Valor máximo é de 12';

            $feed_array = $this->repair_response_json();
            $response = $feed_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];

            /**
             * Lista de array para especificos casos, ( Em Breve)
             * $value['node']['edge_media_to_caption']['edges'][0]['node'] - Descrição do post, breve descricao
             */
            $flag = 0;
            foreach( $response as $key => $value ){
                if( $flag >= $number_post ){ return $insta_data; }

                $insta_data[$key]['img'] = $value['node']['thumbnail_resources'][1]['src'];
                $insta_data[$key]['url'] = 'https://www.instagram.com/p/'. $value['node']['shortcode']. '/';
                
                
                $flag++;                
            }

            return $insta_data;

        }catch(Exception $e){
            print "<script>console.log('Erro no Feedsgram!')<script/>";
            return null;
        }
    }

    private function repair_response_json() {
        $username = $this->profile;
        $insta_source = file_get_contents('https://www.instagram.com/'.$username);
        $shards = explode('window._sharedData = ', $insta_source);
        
        $insta_json = explode(';</', $shards[1]); 
        $insta_array = json_decode($insta_json[0], true);
        return $insta_array;
    }
}
?>